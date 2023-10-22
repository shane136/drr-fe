<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $queryBuilder = $this->departmentModel->select("*")->get();
        return view('home/home.php');
    }

    public function login()
    {
        return view('home/login.php');
    }

    public function signIn()
    {
    if ($this->request->getMethod() == "post") {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $query = $this->accountsModel->where('USERNAME', $username)
                                      ->where('PASSWORD', $password)
                                      ->get();

        if ($query->getNumRows() > 0) {
            
            $userData = $query->getRow();
            $accountsData = [
                'id' => $userData->ID,
                'name' => $userData->NAME,
                'account_type' => $userData->ACCOUNT_TYPE,
                'logged_in' => TRUE
            ];

            session()->set($accountsData);

            if ($userData->ACCOUNT_TYPE == 1) {
                return redirect()->to('/home');
            } 
            else {
                return redirect()->to('/user_home');
            }
        } else {
           
            session()->setFlashdata('error', 'Invalid username or password.');
        }
    }

        return redirect()->to("login");
    }

   
    public function register()
    {
        $queryAccount = $this->accountsModel->select("*")->get();
        $data = [
            "accounts" => $queryAccount->getResult(),
           
        ];
        return view('home/register.php', $data);
    }

    // public function account()
    // {
    // if ($this->request->getMethod() == "post") {
    //     // Get the data from the form
    //     $name = $this->request->getPost('name');
    //     $accountType = $this->request->getVar('accountType');
    //     $username = $this->request->getPost('username');
    //     $password = $this->request->getPost('password');

    //     $accounts = [
    //         "NAME" => $name,
    //         "ACCOUNT_TYPE" => $accountType,
    //         "USERNAME" => $username,
    //         "PASSWORD" => $password,
    //     ];

    //     //Saving the accounts into the database
    //     $this->accountsModel->save($accounts);
    //     session()->setFlashdata('added', "Successfully Registered!");
           
    //     }
    // return redirect()->to("register");
    // }
    
    public function account()
    {
        if ($this->request->getMethod() == "post") {
            // Get the data from the form
            $name = $this->request->getPost('name');
            $accountType = $this->request->getPost('accountType');
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
    
            // Check if the account type is admin == 1
            if ($accountType == 1) {
                // Get the number of existing admin accounts
                $numAdminAccounts = $this->accountsModel->where('ACCOUNT_TYPE', 1)->countAllResults();
    
                // Check if the number of existing admin accounts exceeds the limit (e.g 2 accounts only)
                if ($numAdminAccounts >= 2) {
                    // Return an error message if the limit is exceeded
                    session()->setFlashdata('max_error', "Maximum number of admin accounts reached!");
                    return redirect()->to("register");
                }
            }
    
            $accounts = [
                "NAME" => $name,
                "ACCOUNT_TYPE" => $accountType,
                "USERNAME" => $username,
                "PASSWORD" => $password,
            ];
    
            //Saving the accounts into the database
            $this->accountsModel->save($accounts);
            session()->setFlashdata('reg_added', "Successfully Registered!");
               
        }
        return redirect()->to("register");
    }
    

    

    public function logout()
    {
        session()->destroy(); // Destroy all session data
        return redirect()->to("login"); // Redirect to login page
    }

    public function city()
    {
        $queryBuilder = $this->officialModel->query("SELECT o.ID as ID, o.NAME as 'NAME', o.ADDRESS as 'ADDRESS',
                            o.NUMBER as 'NUMBER', o.EMAIL_ADDRESS as EMAIL_ADDRESS, d.ID as DEPARTMENT_ID, d.NAME 
                            as DEPARTMENT_NAME from official o INNER JOIN department d on d.ID = o.DEPARTMENT_ID");

        $queryDepartment = $this->departmentModel->select("*")->get();
        $data = [
            "officials" => $queryBuilder->getResult(),
            "departments" => $queryDepartment->getResult()
        ];
        return view('home/CityOfficials.php', $data);
    }

    public function add_official (){
        $name = $this->request->getVar("name");
        $address = $this->request->getVar("address");
        $deptId = $this->request->getVar("deptId");
        $contactNumber = $this->request->getVar("contactNumber");
        $email = $this->request->getVar("emailAddress");

        $officialData = [
            "NAME" => $name,
            "ADDRESS" => $address,
            "NUMBER" => $contactNumber,
            "EMAIL_ADDRESS" => $email,
            "DEPARTMENT_ID" => $deptId
        ];

        //Saving the official data into the database
        $this->officialModel->save($officialData);
        session()->setFlashdata('added', "Successfully Added New Data!");

        return redirect()->to("CityOfficials");
    }

    public function batch_add_official(){
        helper(['form']);
        if($this->request->getMethod() == 'post'){
            $file = $this->request->getFile('file');

        /*
            *Move file to the public/csvfiles
        */
        $newFile = $file->getRandomName();
        $file->move('../public/csvfile', $newFile);
        $file = fopen("../public/csvfile/".$newFile, "r");

        $rowCount = 0;
        while(($filedata = fgetcsv($file, 1000, ",")) !== FALSE){
            if($rowCount > 0){

                $name = $filedata[1];
                $address = $filedata[2];
                $contactNumber = $filedata[3];
                $email = $filedata[4];

                $departmentName = strtolower($filedata[0]);
                // $findDepartment = $this->departmentModel->query("SELECT * FROM department where
                //             lower(`NAME`) LIKE %$departmentName%");
                
                $findDepartment = $this->departmentModel->select("*")->LIKE("NAME", $departmentName)->get();

                if(count($findDepartment->getResult()) > 0){

                    foreach($findDepartment->getResult() as $department){

                        
                        $officialData = [
                            "NAME" => $name,
                            "ADDRESS" => $address,
                            "NUMBER" => $contactNumber,
                            "EMAIL_ADDRESS" => $email,
                            "DEPARTMENT_ID" => $department->ID
                        ];
                        
                    }
                    $this->officialModel->save($officialData);
                    session()->setFlashdata('added', "Successfully Added New Data!");
                }

                else{
                    
                    $departmentData = [
                        "NAME" => $filedata[0]
                    ];

                    $this->departmentModel->save($departmentData);
                    $departmentId = $this->departmentModel->getInsertId();

                    $officialData = [
                        "NAME" => $name,
                        "ADDRESS" => $address,
                        "NUMBER" => $contactNumber,
                        "EMAIL_ADDRESS" => $email,
                        "DEPARTMENT_ID" => $departmentId
                    ];

                    $this->officialModel->save($officialData);
                    session()->setFlashdata('added', "Successfully Added New Data!");
                }
                
            }

            $rowCount+=1;
            }
        }
        
        return redirect()->to("CityOfficials");
    }

    public function delete_official($id = 0){
        $userId = $id;
        $result = $this->officialModel->WHERE("id", $userId)->delete($userId);
    
            if ($result) {
                session()->setFlashdata('success', 'Data was successfully deleted!');
            } else {
                session()->setFlashdata('error', 'Failed to delete Data.');
            }
    
            return redirect()->to('CityOfficials');
        }

        public function update_official($id = 0){
   
            if($this->request->getMethod() == "post"){
                $name = $this->request->getVar("name");
                $address = $this->request->getVar("address");
                $contactNumber = $this->request->getVar("contactNumber");
                $emailAddress = $this->request->getVar("emailAddress");
                $DEPARTMENT_ID = $this->request->getVar("DEPARTMENT_ID");
                $DEPARTMENT_NAME = $this->request->getVar("DEPARTMENT_NAME");
        
                $data = [
                    "NAME" => $name,
                    "ADDRESS" => $address,
                    "NUMBER" => $contactNumber,
                    "EMAIL_ADDRESS" => $emailAddress,
                    "DEPARTMENT_ID" => $DEPARTMENT_ID,
                    "DEPARTMENT_NAME" => $DEPARTMENT_NAME,
                ];
        
                $official = $this->officialModel->update($id, $data);
        
                if ($official) {
                    session()->setFlashdata('update', "Data has been successfully updated!");
                    return redirect()->to("CityOfficials");
                } else {
                    session()->setFlashdata('error', 'Data not found.');
                    return redirect()->to('CityOfficials');
                }
            } 
        }
    
    public function brgy()
    {
       
        $queryBrgy = $this->brgyModel->select("*")->get();
        $data = [
            "brgy" => $queryBrgy->getResult(),
           
        ];
        return view('home/BrgyOfficials.php', $data);
    }

    public function add_brgy (){
        $brgy = $this->request->getVar("brgy");
        $name = $this->request->getVar("name");
        $cnum = $this->request->getVar("cnum");
        $email = $this->request->getVar("emailAddress");

        $officialData = [
            "BRGY" => $brgy,
            "NAME" => $name,
            "CONTACT_NUMBER" => $cnum,
            "EMAIL_ADD" => $email,
        ];

        //Saving the official data into the database
        $this->brgyModel->save($officialData);
        session()->setFlashdata('added', "Successfully Added New Data!");

        return redirect()->to("BrgyOfficials");
    }

    public function batch_add_brgy(){
        helper(['form']);
    
        if ($this->request->getMethod() == 'post') {
            $file = $this->request->getFile('file');
            
            // Move file to the public/csvfiles
            $newFile = $file->getRandomName();
            $file->move('../public/csvfile', $newFile);
            $file = fopen("../public/csvfile/".$newFile, "r");
    
            $rowCount = 0;
            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                if ($rowCount > 0) {
                    $brgy = $filedata[0];
                    $name = $filedata[1];
                    $cnum = $filedata[2];
                    $email = $filedata[3];
    
                    $officialData = [
                        "BRGY" => $brgy,
                        "NAME" => $name,
                        "CONTACT_NUMBER" => $cnum,
                        "EMAIL_ADD" => $email,
                    ];
    
                    // Saving the official data into the database
                    $this->brgyModel->save($officialData);
                }
                $rowCount += 1;
            }
    
            fclose($file);
            session()->setFlashdata('added', "Successfully Added New Data!");
        }
        
        return redirect()->to("BrgyOfficials");
    }
    

    public function delete_brgy($id = 0){
        $userId = $id;
        $result = $this->brgyModel->WHERE("id", $userId)->delete($userId);
    
            if ($result) {
                session()->setFlashdata('success', 'Data was successfully deleted!');
            } else {
                session()->setFlashdata('error', 'Failed to delete Data.');
            }
    
            return redirect()->to('BrgyOfficials');
        }
    
        public function update_brgy($id = 0){
       
        if($this->request->getMethod() == "post"){

            $brgy = $this->request->getVar("brgy");
            $name = $this->request->getVar("name");
            $cnum = $this->request->getVar("cnum");
            $email = $this->request->getVar("emailAddress");
           
            $data = [
                "BRGY" => $brgy,
                "NAME" => $name,
                "CONTACT_NUMBER" => $cnum,
                "EMAIL_ADD" => $email,
            ];
    
            $brgy = $this->brgyModel->update($id, $data);
    
            if ($brgy) {
                session()->setFlashdata('update', "Data has been successfully updated!");
                return redirect()->to("BrgyOfficials");
            } else {
                session()->setFlashdata('error', 'Data not found.');
                return redirect()->to('BrgyOfficials');
            }
        } 
    }
    
    public function govt()
    {
       $queryBuilder = $this->govtModel->query("SELECT o.ID as ID, o.HEAD as 'HEAD', o.CONTACT as 'CONTACT',
                        o.EMAIL as 'EMAIL', d.ID as OFFICE_ID, d.NAME as OFFICE_NAME from govt o INNER JOIN
                        office d on d.ID = o.OFFICE_ID");

        $queryOffice = $this->officeModel->select("*")->get();
        $data = [
            "govt" => $queryBuilder->getResult(),
            "offices" => $queryOffice->getResult()
        ];
        return view('home/govt.php', $data);
    }

    public function add_office(){ //add_govt
        $head = $this->request->getVar("head");
        $contact = $this->request->getVar("contact");
        $email = $this->request->getVar("email");
        $officeId = $this->request->getVar("officeId");

        $officeData = [
            "HEAD" => $head,
            "CONTACT" => $contact,
            "EMAIL" => $email,
            "OFFICE_ID" => $officeId
        ];

        //Saving the official data into the database
        $this->govtModel->save($officeData);
        session()->setFlashdata('added', "Successfully Added New Data!");

        return redirect()->to("govt");
    }

    public function batch_add_office()
    {
    helper('form');

    if ($this->request->getMethod() == 'post') {

        $file = $this->request->getFile('file');

        //Move file to the public/csvfiles directory
        $newFile = $file->getRandomName();
        $file->move('../public/csvfile', $newFile);
        $file = fopen("../public/csvfile/".$newFile, "r");

        $rowCount = 0;
        while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
            if ($rowCount > 0) {

                $officeName = $filedata[0];
                $head = $filedata[1];
                $contact = $filedata[2];
                $email = $filedata[3];

                //check if the office already exists
                $office = $this->officeModel->select('*')->where('NAME', $officeName)->first();

                if ($office) {
                    //if office exists, add new data
                    $officeId = $office['ID'];
                } else {
                    //if office does not exist, add new office and then add new data
                    $officeData = [
                        "NAME" => $officeName
                    ];

                    $this->officeModel->save($officeData);
                    $officeId = $this->officeModel->getInsertID();
                }

                $officeData = [
                    "HEAD" => $head,
                    "CONTACT" => $contact,
                    "EMAIL" => $email,
                    "OFFICE_ID" => $officeId
                ];

                //Saving the official data into the database
                $this->govtModel->save($officeData);
                session()->setFlashdata('added', "Successfully Added New Data!");
            }

            $rowCount += 1;
        }

        fclose($file);
    }

    return redirect()->to("govt");
    }

    
    public function delete_office($id = 0){
        $userId = $id;
        $result = $this->govtModel->WHERE("id", $userId)->delete($userId);
    
            if ($result) {
                session()->setFlashdata('success', 'Data was successfully deleted!');
            } else {
                session()->setFlashdata('error', 'Failed to delete Data.');
            }
    
            return redirect()->to('govt');
        }

        public function update_office($id = 0){
   
            if($this->request->getMethod() == "post"){
                $head = $this->request->getVar("head");
                $contact = $this->request->getVar("contact");
                $email = $this->request->getVar("email");
                $officeId = $this->request->getVar("OFFICE_ID");
        
                $data = [
                    "HEAD" => $head,
                    "CONTACT" => $contact,
                    "EMAIL" => $email,
                    "OFFICE_ID" => $officeId
                ];
        
                $govt = $this->govtModel->update($id, $data);
        
                if ($govt) {
                    session()->setFlashdata('update', "Data has been successfully updated!");
                    return redirect()->to("govt");
                } else {
                    session()->setFlashdata('error', 'Data not found.');
                    return redirect()->to('govt');
                }
            } 
        }
                
    public function batch_add_offices(){ //batch_add_govt
        helper(['form']);
        if($this->request->getMethod() == 'post'){
            $file = $this->request->getFile('file');

        /*
            *Move file to the public/csvfiles
        */
        $newFile = $file->getRandomName();
        $file->move('../public/csvfile', $newFile);
        $file = fopen("../public/csvfile/".$newFile, "r");

        $rowCount = 0;
        while(($filedata = fgetcsv($file, 1000, ",")) !== FALSE){
            if($rowCount > 0){

                $name = $filedata[0];
                $data = [
                    "NAME" => $name
                ];

                $this->officeModel->save($data);
                
            }   
            $rowCount+=1;
        }
        session()->setFlashdata('added', "Successfully Added New Data!");

        return redirect()->to("offices");
    }
    }

    public function offices() 
    {
        $queryBuilder = $this->officeModel->select("*")->get();

        $data = [

            "offices" => $queryBuilder->getResult()
        ];
        return view('home/offices.php', $data);
    }

    public function add_offices (){
        $name = $this->request->getVar("name");
      
        $officesData = [
            "NAME" => $name,
        ];

        //Saving the official data into the database
        $this->officeModel->save($officesData);
        session()->setFlashdata('added', "Successfully Added New Data!");

        return redirect()->to("offices");
    }

    public function delete_offices($id = 0){
        $userId = $id;
        $result = $this->officeModel->WHERE("id", $userId)->delete($userId);
    
            if ($result) {
                session()->setFlashdata('success', 'Data was successfully deleted!');
            } else {
                session()->setFlashdata('error', 'Failed to delete Data.');
            }
    
            return redirect()->to('offices');
        }

        public function update_offices($id = 0){
   
            if($this->request->getMethod() == "post"){

                $name = $this->request->getVar("name");
           
                $data = [
                    "NAME" => $name,
                ];
        
                $office = $this->officeModel->update($id, $data);
        
                if ($office) {
                    session()->setFlashdata('update', "Data has been successfully updated!");
                    return redirect()->to("offices");
                } else {
                    session()->setFlashdata('error', 'Data not found.');
                    return redirect()->to('offices');
                }
            } 
        }
        

    public function admin()
    {
        $queryAdmin = $this->adminModel->select("*")->get();
        $data = [
            "admins" => $queryAdmin->getResult(),
           
        ];
        return view('home/admin.php', $data);
    }

    public function add_admin (){
        $name = $this->request->getVar("name");
        $contact = $this->request->getVar("contact");
        $address = $this->request->getVar("address");
        $pos = $this->request->getVar("pos");

        $adminData = [
            "NAME" => $name,
            "CONTACT" => $contact,
            "ADDRESS" => $address,
            "POSITION" => $pos,
        ];

        //Saving the official data into the database
        $this->adminModel->save($adminData);
        session()->setFlashdata('added', "Successfully Added New Data!");

        return redirect()->to("admin");
    }

    public function delete_admin($id = 0){
        $userId = $id;
        $result = $this->adminModel->WHERE("id", $userId)->delete($userId);
    
            if ($result) {
                session()->setFlashdata('success', 'Data was successfully deleted!');
            } else {
                session()->setFlashdata('error', 'Failed to delete Data.');
            }
    
            return redirect()->to('admin');
        }
    
        public function update_admin($id = 0){
       
        if($this->request->getMethod() == "post"){
            $name = $this->request->getVar("name");
            $contact = $this->request->getVar("contact");
            $address = $this->request->getVar("address");
            $pos = $this->request->getVar("pos");
    
            $data = [
                "NAME" => $name,
                "CONTACT" => $contact,
                "ADDRESS" => $address,
                "POSITION" => $pos,
            ];
    
            $admin = $this->adminModel->update($id, $data);
    
            if ($admin) {
                session()->setFlashdata('update', "Data has been successfully updated!");
                return redirect()->to("admin");
            } else {
                session()->setFlashdata('error', 'Data not found.');
                return redirect()->to('admin');
            }
        } 
    }
    
    public function batch_add_admin(){
        helper(['form']);
    
        if($this->request->getMethod() == 'post'){
    
            $file = $this->request->getFile('file');
    
            /*
            *Move file to the public/csvfiles
            */
            $newFile = $file->getRandomName();
            $file->move('../public/csvfile', $newFile);
            $file = fopen("../public/csvfile/".$newFile, "r");
    
            $rowCount = 0;
            while(($filedata = fgetcsv($file, 1000, ",")) !== FALSE){
                if($rowCount > 0){
    
                    $name = $filedata[0];
                    $contactNumber = $filedata[1];
                    $address = $filedata[2];
                    $position = $filedata[3];
    
                    $adminData = [
                        "NAME" => $name,
                        "CONTACT" => $contactNumber,
                        "ADDRESS" => $address,
                        "POSITION" => $position,
                    ];
    
                    //Saving the admin data into the database
                    $this->adminModel->save($adminData);
                    session()->setFlashdata('added', "Successfully Added New Data!");
                    
                }
    
                $rowCount+=1;
            }
        }
    
        return redirect()->to("admin");
    }
    

    public function commcen()
    {
        $queryCommcen = $this->commcenModel->select("*")->get();
        $data = [
            "comms" => $queryCommcen->getResult(),
           
        ];
        return view('home/commcen.php', $data);
    }

    public function add_commcen(){
        $name = $this->request->getVar("name");
        $contact = $this->request->getVar("contact");
        $address = $this->request->getVar("address");
        $pos = $this->request->getVar("pos");

        $commcenData = [
            "NAME" => $name,
            "CONTACT" => $contact,
            "ADDRESS" => $address,
            "POSITION" => $pos,
        ];

        //Saving the official data into the database
        $this->commcenModel->save($commcenData);
        session()->setFlashdata('added', "Successfully Added New Data!");

        return redirect()->to("commcen");
    }

    public function delete_commcen($id = 0){
        $userId = $id;
        $result = $this->commcenModel->WHERE("id", $userId)->delete($userId);
    
            if ($result) {
                session()->setFlashdata('success', 'Data was successfully deleted!');
            } else {
                session()->setFlashdata('error', 'Failed to delete Data.');
            }
    
            return redirect()->to('commcen');
        }
    
        public function update_commcen($id = 0){
       
        if($this->request->getMethod() == "post"){
            $name = $this->request->getVar("name");
            $contact = $this->request->getVar("contact");
            $address = $this->request->getVar("address");
            $pos = $this->request->getVar("pos");
    
            $data = [
                "NAME" => $name,
                "CONTACT" => $contact,
                "ADDRESS" => $address,
                "POSITION" => $pos,
            ];
    
            $commcen = $this->commcenModel->update($id, $data);
    
            if ($commcen) {
                session()->setFlashdata('update', "Data has been successfully updated!");
                return redirect()->to("commcen");
            } else {
                session()->setFlashdata('error', 'Data not found.');
                return redirect()->to('commcen');
            }
        } 
    }
    
    public function batch_add_commcen(){
        helper(['form']);
    
        if($this->request->getMethod() == 'post'){
    
            $file = $this->request->getFile('file');
    
            /*
            *Move file to the public/csvfiles
            */
            $newFile = $file->getRandomName();
            $file->move('../public/csvfile', $newFile);
            $file = fopen("../public/csvfile/".$newFile, "r");
    
            $rowCount = 0;
            while(($filedata = fgetcsv($file, 1000, ",")) !== FALSE){
                if($rowCount > 0){
    
                    $name = $filedata[0];
                    $contactNumber = $filedata[1];
                    $address = $filedata[2];
                    $position = $filedata[3];
    
                    $commcenData = [
                        "NAME" => $name,
                        "CONTACT" => $contactNumber,
                        "ADDRESS" => $address,
                        "POSITION" => $position,
                    ];
    
                    //Saving the admin data into the database
                    $this->commcenModel->save($commcenData);
                    session()->setFlashdata('added', "Successfully Added New Data!");
                    
                }
    
                $rowCount+=1;
            }
        }
    
        return redirect()->to("commcen");
    }
    
    public function logistics()
    {
        $queryLogistics = $this->logisticsModel->select("*")->get();
        $data = [
            "logs" => $queryLogistics->getResult(),
           
        ];
    
        return view('home/logistics.php', $data);
    }

    public function add_logistics(){
        $name = $this->request->getVar("name");
        $contact = $this->request->getVar("contact");
        $address = $this->request->getVar("address");
        $pos = $this->request->getVar("pos");

        $logisticsData = [
            "NAME" => $name,
            "CONTACT" => $contact,
            "ADDRESS" => $address,
            "POSITION" => $pos,
        ];

        //Saving the official data into the database
        $this->logisticsModel->save($logisticsData);
        session()->setFlashdata('added', "Successfully Added New Data!");

        return redirect()->to("logistics");
    }

    public function delete_logistics($id = 0){
        $userId = $id;
        $result = $this->logisticsModel->WHERE("id", $userId)->delete($userId);
    
            if ($result) {
                session()->setFlashdata('success', 'Data was successfully deleted!');
            } else {
                session()->setFlashdata('error', 'Failed to delete Data.');
            }
    
            return redirect()->to('logistics');
        }
    
        public function update_logistics($id = 0){
       
        if($this->request->getMethod() == "post"){
            $name = $this->request->getVar("name");
            $contact = $this->request->getVar("contact");
            $address = $this->request->getVar("address");
            $pos = $this->request->getVar("pos");
    
            $data = [
                "NAME" => $name,
                "CONTACT" => $contact,
                "ADDRESS" => $address,
                "POSITION" => $pos,
            ];
    
            $logistics = $this->logisticsModel->update($id, $data);
    
            if ($logistics) {
                session()->setFlashdata('update', "Data has been successfully updated!");
                return redirect()->to("logistics");
            } else {
                session()->setFlashdata('error', 'Data not found.');
                return redirect()->to('logistics');
            }
        } 
    }
    
    public function batch_add_logs(){
        helper(['form']);
    
        if($this->request->getMethod() == 'post'){
    
            $file = $this->request->getFile('file');
    
            /*
            *Move file to the public/csvfiles
            */
            $newFile = $file->getRandomName();
            $file->move('../public/csvfile', $newFile);
            $file = fopen("../public/csvfile/".$newFile, "r");
    
            $rowCount = 0;
            while(($filedata = fgetcsv($file, 1000, ",")) !== FALSE){
                if($rowCount > 0){
    
                    $name = $filedata[0];
                    $contactNumber = $filedata[1];
                    $address = $filedata[2];
                    $position = $filedata[3];
    
                    $logsData = [
                        "NAME" => $name,
                        "CONTACT" => $contactNumber,
                        "ADDRESS" => $address,
                        "POSITION" => $position,
                    ];
    
                    //Saving the admin data into the database
                    $this->logisticsModel->save($logsData);
                    session()->setFlashdata('added', "Successfully Added New Data!");
                    
                }
    
                $rowCount+=1;
            }
        }
    
        return redirect()->to("logistics");
    }
    
    public function ops()
    {
        $queryOps = $this->opsModel->select("*")->get();
        $data = [
            "operation" => $queryOps->getResult(),
           
        ];
        
        return view('home/ops.php', $data);
    }

    public function add_ops(){
        $name = $this->request->getVar("name");
        $contact = $this->request->getVar("contact");
        $address = $this->request->getVar("address");
        $pos = $this->request->getVar("pos");

        $opsData = [
            "NAME" => $name,
            "CONTACT" => $contact,
            "ADDRESS" => $address,
            "POSITION" => $pos,
        ];

        //Saving the official data into the database
        $this->opsModel->save($opsData);
        session()->setFlashdata('added', "Successfully Added New Data!");

        return redirect()->to("ops");
    }

    public function delete_ops($id = 0){
        $userId = $id;
        $result = $this->opsModel->WHERE("id", $userId)->delete($userId);
    
            if ($result) {
                session()->setFlashdata('success', 'Data was successfully deleted!');
            } else {
                session()->setFlashdata('error', 'Failed to delete Data.');
            }
    
            return redirect()->to('ops');
        }

    public function update_ops($id = 0){
   
            if($this->request->getMethod() == "post"){
                $name = $this->request->getVar("name");
                $contact = $this->request->getVar("contact");
                $address = $this->request->getVar("address");
                $pos = $this->request->getVar("pos");
        
                $data = [
                    "NAME" => $name,
                    "CONTACT" => $contact,
                    "ADDRESS" => $address,
                    "POSITION" => $pos,
                ];
        
                $ops = $this->opsModel->update($id, $data);
        
                if ($ops) {
                    session()->setFlashdata('update', "Data has been successfully updated!");
                    return redirect()->to("ops");
                } else {
                    session()->setFlashdata('error', 'Data not found.');
                    return redirect()->to('ops');
                }
            } 
        }

        public function batch_add_ops(){
            helper(['form']);
        
            if($this->request->getMethod() == 'post'){
        
                $file = $this->request->getFile('file');
        
                /*
                *Move file to the public/csvfiles
                */
                $newFile = $file->getRandomName();
                $file->move('../public/csvfile', $newFile);
                $file = fopen("../public/csvfile/".$newFile, "r");
        
                $rowCount = 0;
                while(($filedata = fgetcsv($file, 1000, ",")) !== FALSE){
                    if($rowCount > 0){
        
                        $name = $filedata[0];
                        $contactNumber = $filedata[1];
                        $address = $filedata[2];
                        $position = $filedata[3];
        
                        $opsData = [
                            "NAME" => $name,
                            "CONTACT" => $contactNumber,
                            "ADDRESS" => $address,
                            "POSITION" => $position,
                        ];
        
                        //Saving the admin data into the database
                        $this->opsModel->save($opsData);
                        session()->setFlashdata('added', "Successfully Added New Data!");
                        
                    }
        
                    $rowCount+=1;
                }
            }
        
            return redirect()->to("ops");
        }

    public function training()
    {
        $queryTraining = $this->trainingModel->select("*")->get();
        $data = [
            "trainings" => $queryTraining->getResult(),
           
        ];

        return view('home/training.php', $data);
    }

    public function add_training(){
        $name = $this->request->getVar("name");
        $contact = $this->request->getVar("contact");
        $address = $this->request->getVar("address");
        $pos = $this->request->getVar("pos");

        $trainingData = [
            "NAME" => $name,
            "CONTACT" => $contact,
            "ADDRESS" => $address,
            "POSITION" => $pos,
        ];

        //Saving the official data into the database
        $this->trainingModel->save($trainingData);
        session()->setFlashdata('added', "Successfully Added New Data!");

        return redirect()->to("training");
    }

    public function delete_training($id = 0){
    $userId = $id;
    $result = $this->trainingModel->WHERE("id", $userId)->delete($userId);

        if ($result) {
            session()->setFlashdata('success', 'Data was successfully deleted!');
        } else {
            session()->setFlashdata('error', 'Failed to delete Data.');
        }

        return redirect()->to('training');
    }

    public function update_training($id = 0){
   
    if($this->request->getMethod() == "post"){
        $name = $this->request->getVar("name");
        $contact = $this->request->getVar("contact");
        $address = $this->request->getVar("address");
        $pos = $this->request->getVar("pos");

        $data = [
            "NAME" => $name,
            "CONTACT" => $contact,
            "ADDRESS" => $address,
            "POSITION" => $pos,
        ];

        $training = $this->trainingModel->update($id, $data);

        if ($training) {
            session()->setFlashdata('update', "Data has been successfully updated!");
            return redirect()->to("training");
        } else {
            session()->setFlashdata('error', 'Data not found.');
            return redirect()->to('training');
        }
    } 
}

public function batch_add_training(){
    helper(['form']);

    if($this->request->getMethod() == 'post'){

        $file = $this->request->getFile('file');

        /*
        *Move file to the public/csvfiles
        */
        $newFile = $file->getRandomName();
        $file->move('../public/csvfile', $newFile);
        $file = fopen("../public/csvfile/".$newFile, "r");

        $rowCount = 0;
        while(($filedata = fgetcsv($file, 1000, ",")) !== FALSE){
            if($rowCount > 0){

                $name = $filedata[0];
                $contactNumber = $filedata[1];
                $address = $filedata[2];
                $position = $filedata[3];

                $trainData = [
                    "NAME" => $name,
                    "CONTACT" => $contactNumber,
                    "ADDRESS" => $address,
                    "POSITION" => $position,
                ];

                //Saving the data into the database
                $this->trainingModel->save($trainData);
                session()->setFlashdata('added', "Successfully Added New Data!");
                
            }

            $rowCount+=1;
        }
    }

    return redirect()->to("training");
}

public function notification(){

    return view('home/notification.php');
}

}
