<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use CodeIgniter\API\ResponseTrait;
use \App\Models\Department;
use \App\Models\Official;
use \App\Models\Brgy;
use \App\Models\Govt;
use \App\Models\Office;
use \App\Models\Admin;
use \App\Models\Commcen;
use \App\Models\Logistics;
use \App\Models\Ops;
use \App\Models\Training;
use \App\Models\Accounts;
use \App\Models\Notification;


/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    use ResponseTrait;
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->departmentModel = new Department();
        $this->officialModel = new Official();
        $this->brgyModel = new brgy();
        $this->officeModel = new Office();
        $this->govtModel = new Govt();
        $this->adminModel = new Admin();
        $this->commcenModel = new Commcen();
        $this->logisticsModel = new Logistics();
        $this->opsModel = new Ops();
        $this->trainingModel = new Training();
        $this->accountsModel = new Accounts();
        $this->notificationModel = new Notification();
        



        // E.g.: $this->session = \Config\Services::session();
    }

}
