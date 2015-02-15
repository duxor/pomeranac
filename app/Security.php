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
    private $redirectURL;
    private $minLenPass = 4; //minimalna duzina sifre i korisnickog imena

    public function setRedirectURL($url){
        $this->redirectURL = $url;
    }
    public function redirect(){
        return redirect($this->redirectURL);
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
        $this->test = false;
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
            }else DB::table('korisnici')->where('id', $this->id)->update(['token' => null]);
        }else $this->test = false;
        if(isset($this->redirectURL[1])) $this->redirectURL = $this->test ? $this->redirectURL[0] : $this->redirectURL[1];
        return $this->redirect();
    }
    private function setSessions(){
        Session::put('token', $this->token);
        Session::put('id', $this->id);
        Session::put('username', $this->username);
    }
    public function logout(){
        if(Session::has('id')) {
            $korisnik = Korisnici::all(['id', 'token'])->find(Session::get('id'));
            $korisnik->token = null;
            $korisnik->save();
        }
        Session::flush();
        return $this->redirect();
    }
    public function autentifikacija($target, $dodaci){
        return $this->autentifikacijaTest() ? $dodaci ? view($target, $dodaci) : view($target) : $this->logout();
    }
    public function autentifikacijaTest(){
        if(Session::has('id') and Session::has('token')) {
            $korisnik = Korisnici::all(['id', 'token'])->where('id', Session::get('id'))->where('token', Session::get('token'))->first();
            return $korisnik ? true : false;
        }else return false;
    }

}