<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Security;
use App\Sadrzaj;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class Content extends Controller{
	public function getIndex(){
		$sadrzaj = Sadrzaj::where('slug','=','pocetna')->get(['id','naslov','slug','sadrzaj'])->first();
		return Security::autentifikacija('administracija.sadrzaj',compact('sadrzaj'));

	}
	public function postSadrzaj()
    {
    	$podaci=json_decode(Input::get('podaci'));
        $galerija=Sadrzaj::where('slug','=',$podaci->slug)->update(['naslov'=>$podaci->naslov,'sadrzaj'=>$podaci->sadrzaj]);
        return json_encode(['msg'=>'Uspešno ste izvršili dodavanje.','check'=>1]);
    }
    public function postArea()
    {
    $podaci=$_POST['tip'];
   $sad=Sadrzaj::where('slug','=',$podaci)->get(['naslov','slug','sadrzaj'])->first();
    return json_encode($sad);
    }



}