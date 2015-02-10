<?php
/**
 * Created by PhpStorm.
 * User: Dušan
 * Date: 2/9/2015
 * Time: 12:20 AM
 */

namespace App;

use App\Korisnici;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class Security {////////////////////// IZRADA U TOKU
    private $id;
    private $username;
    private $password;
    private $salt = 'ix501^@)5MwfP39ijJDr27g';
    private $test;
    private $token;
    private $redirectURL; // URL na koji se prosledjuje u slucaju da autentifikacija nije zadovoljena
    private $minLenPass = 4; //minimalna duzina sifre i korisnickog imena

    public function setRedirectUrl($url){
        $this->redirectURL = $url;
    }
    private function setUsername($username){
        $this->username = $username;
    }
    private function setPass($pass){
        $this->password = $pass;
    }
    public function generateHashPass($pass){
        $this->setPass(password_hash($pass.$this->salt, PASSWORD_BCRYPT, ['cost' => 12]));
        return $this->password;
    }
    private function generateToken(){
        $this->setToken(hash('haval256,5', $this->salt.uniqid().openssl_random_pseudo_bytes(50), false));
        return $this->token;
    }
    public function setToken($token){
        $this->token = $token;
    }
    private function testInput($in){
        return strlen($in)>$this->minLenPass;
    }
    public function login($username, $password){
        if($this->testInput($username) and $this->testInput($password)){
            $this->setUsername($username);
            $this->setPass($password);

            $korisnik = Korisnici::all(['id','username', 'password'])->where('username',$this->username)->first();
            $this->test = $korisnik ? password_verify($this->password.$this->salt, $korisnik->password) : false;

            if ($this->test) {
                $this->id = $korisnik->id;
                $this->username = $korisnik->username;
                $this->generateToken();
                DB::table('korisnici')->where('id', $this->id)->update(['token' => $this->token]);
                $this->setSessions();
            }
            return $this->test;
        }else return false;
    }
    public function setSessions(){
        Session::put('token', $this->token);
        Session::put('id', $this->id);
        Session::put('username', $this->username);
    }
    public function autentifikacija($id,$token){
        //autentifikacija  u izradi
    }

}