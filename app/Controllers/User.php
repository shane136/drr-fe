<?php 

namespace App\Controllers;

class User extends BaseController
{

    public function user_home() {
        
        return view('home/user/user_home');
    }

    public function cityOfficials()
    {
        $queryBuilder = $this->officialModel->query("SELECT o.ID as ID, o.NAME as 'NAME', o.ADDRESS as 'ADDRESS',
                            o.NUMBER as 'NUMBER', o.EMAIL_ADDRESS as EMAIL_ADDRESS, d.ID as DEPARTMENT_ID, d.NAME 
                            as DEPARTMENT_NAME from official o INNER JOIN department d on d.ID = o.DEPARTMENT_ID");

        $queryDepartment = $this->departmentModel->select("*")->get();
        $data = [
            "officials" => $queryBuilder->getResult(),
            "departments" => $queryDepartment->getResult()
        ];
        return view('home/user/cityOfficials.php', $data);
    }

    public function brgyOfficials()
    {
       
        $queryBrgy = $this->brgyModel->select("*")->get();
        $data = [
            "brgy" => $queryBrgy->getResult(),
           
        ];
        return view('home/user/brgyOfficials.php', $data);
    }

    public function government()
    {
       $queryBuilder = $this->govtModel->query("SELECT o.ID as ID, o.HEAD as 'HEAD', o.CONTACT as 'CONTACT',
                        o.EMAIL as 'EMAIL', d.ID as OFFICE_ID, d.NAME as OFFICE_NAME from govt o INNER JOIN
                        office d on d.ID = o.OFFICE_ID");

        $queryOffice = $this->officeModel->select("*")->get();
        $data = [
            "govt" => $queryBuilder->getResult(),
            "offices" => $queryOffice->getResult()
        ];
        return view('home/user/government.php', $data);
    }

    public function Admin()
    {
        $queryAdmin = $this->adminModel->select("*")->get();
        $data = [
            "admins" => $queryAdmin->getResult(),
           
        ];
        return view('home/user/Admin.php', $data);
    }

    public function Commcen()
    {
        $queryCommcen = $this->commcenModel->select("*")->get();
        $data = [
            "comms" => $queryCommcen->getResult(),
           
        ];
        return view('home/user/Commcen.php', $data);
    }

    public function Logistics()
    {
        $queryLogistics = $this->logisticsModel->select("*")->get();
        $data = [
            "logs" => $queryLogistics->getResult(),
           
        ];
    
        return view('home/user/Logistics.php', $data);
    }

    public function Operations()
    {
        $queryOps = $this->opsModel->select("*")->get();
        $data = [
            "operation" => $queryOps->getResult(),
           
        ];
        
        return view('home/user/Operations.php', $data);
    }


    public function Training()
    {
        $queryTraining = $this->trainingModel->select("*")->get();
        $data = [
            "trainings" => $queryTraining->getResult(),
           
        ];

        return view('home/user/Training.php', $data);
    }



}



?>