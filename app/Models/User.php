<?php

namespace App\Models;
use Core\Database;

class User {
   
    private $table = "user";

    public function getAll() {
        $db = Database::getInstance();
        
        return $db->getList($this->table, '*');
    }

    // Pegar Dados

    public function record($data = null) {
        $db = Database::getInstance();

        if($data == null || empty($data)) return false;

           // confirmar dados - se a senha/email não estiver certo

           if(!isset($data['pass']) || !isset($data['password']) || !isset($data['email'])) {
               return false;
           }
   
           if(filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        
           // gravar no banco 
           
           $data = [
            'nome' => $data['name'],
            'email' => $data['email'],
            'senha' => password_hash($data['pass'], PASSWORD_BCRYPT, ["cost" => 10]),
        ];

        return $db->insert($this->table, $data);
    }
  }

}

    // fazer o update dos dados 
    public function update($data, $condition) {
    $db = Database::getInstance();
       
       if($data != null && !empty(&data)){
        
        $data = [
            // somente os dados que podem ser alterados
            'nome' => $data['name'],
            'senha' => $data['pass'],
                 
        ]

       }

    return $db->update($this->table, $data, $condition);
}
    // fazer delete dos dados
    public function delete($id) {
    $db = Database::getInstance();

    $db->delete($this->table, ['cod_cadastro' => $id]);
    return false;
}
   // fazer consulta dos dados
    function login($data) {
    $db = Database::getInstance();

    if(!isset($data['email']) ||  !isset($data['senha'])) {
        return false;
    }

    $user = $db->getList($this->table, '*', ['email' => $data['email']]);
  
    if(isset($user[0]['id'])) {
        if(password_verify($data['senha'] , $user[0]['senha'])) {
            return $user[0];
        }
    }

    return false;

   }
}
