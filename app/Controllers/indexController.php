<?php
namespace App\Controllers;

// Controller 01

use Core\Controller;
use Core\Request;
use App\Models\User;
use Core\Session;

class IndexController extends Controller {
    
    public function index() {
        $session = Session::getInstance();
        $user = $session->get('user');
        
        if(isset($user['id'])) {
            $this->view('index', ['user' => $user]);
        } else {
            $this->view('index');
        }

        
    }
}

class IndexController extends Controller {

    public function index() {
        $session = Session::getInstance();
        $user = $session->get('email');
        
        if(isset($user['cod_cadastro'])) {
            $this->view('index', ['cadastro' => $user]);
        } else {
            $this->view('index');
        }

        
    }
}    
