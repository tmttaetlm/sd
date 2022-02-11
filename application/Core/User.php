<?php
/*
 * Class User
 */

namespace Core;
use Components\Db;

class User 
{

    public function __construct() 
    {
        $this->getUserFromDb();
    }
    
    //Get user data from DB, by user iin from session 
    private function getUserFromDb()
    {
        if (isset($_SESSION['login']))
        {
            
        };
    }
    
    //Signing (athorize by AD)
    public function signIn($login,$password)
    {
        $query = "SELECT login, password, role FROM sd_users WHERE login = :login AND password = :password";
        $db = Db::getDb();
        $user = $db->selectQuery($query,['login' => $login, 'password' => $password]);
        if (!empty($user)) {
            $_SESSION['login'] = $user[0]['login'];
            $_SESSION['role'] = $user[0]['role'];
            return true;
        } else {
            return false;
        }
    }
    
    public function isAuth(){
        //Checks is the user authorized?
        if (!isset($_SESSION['user']))
        {
            if (isset($_POST['ajax']))
            {
                exit('Время сессии истекло, <a href="/">выполните вход</a>');
            }

            if(!(($controllerName == 'user') && ($actionName =='signin')))
            {
                $controllerName = 'user';
                $actionName = 'login';    
            }
        }
    }

    public function checkAdmin() {
        if (in_array('adminPanel', $this->getPriveleges())){
            return true;
        }
        else return false;
    }
}
