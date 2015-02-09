<?php
/**
 * Created by PhpStorm.
 * User: Dušan
 * Date: 2/9/2015
 * Time: 12:20 AM
 */

namespace App\Http;


class Security {////////////////////// IZRADA U TOKU
    private $username;
    private $password;
    private $salt = 'ix501^@)5MwfP39ijJDr27g';
    private $uBazi;
    private $token;

    private function setUsername($username){
        $this->$username = $username;
    }
    private function setPass($pass){
        $this->$password = password_hash($pass.$this->salt, PASSWORD_BCRYPT, ['cost' => 12]);
    }
    public function Secutity($username, $password){
        $this->setUsername($username);
        $this->setPass($password);
    }
    public function autentifikacija(){

    }
}