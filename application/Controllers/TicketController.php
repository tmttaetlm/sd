<?php
namespace Controllers;

use Core\Controller;
use Core\View;
use Models\TicketModel;

Class TicketController extends Controller
{
    public function __construct() 
    {
        parent::__construct();
        $this->checkLogged();
        $this->model = new TicketModel($this->view);
    }
    
    public function actionIndex() 
    {
        $data = [];
        $data['content'] = $this->view->generate('ticket/new-ticket',$data);
        $data['systemTitle'] = 'Новая заявка';
        $data['content'] = $this->view->generate('framework/system',$data);
        $data['user'] = $_SESSION['login'];
        
        echo $this->view->generate('templateView',$data);
    }

    public function actionAddNewTicket()
    {
        $this->model->addNewTicket($_POST);
    }

    public function actionChangeStatus()
    {
        $this->model->changeStatus($_POST);
    }
}