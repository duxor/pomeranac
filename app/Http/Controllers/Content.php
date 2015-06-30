<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Security;
use App\Sadrzaj;
use App\Korisnici;
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
        return json_encode(['msg'=>'Uspešno ste izvršili ažuriranje.','check'=>1]);
    }
    public function postArea()
    {
    $podaci=$_POST['tip'];
   $sad=Sadrzaj::where('slug','=',$podaci)->get(['naslov','slug','sadrzaj'])->first();
    return json_encode($sad);
    }
    public function postKontakt()
    {
    $podaci=json_decode(Input::get('podaci'));
    Sadrzaj::where('id','=',$podaci->id)->update(['naslov'=>$podaci->naslov,'sadrzaj'=>$podaci->sadrzaj]);
    Sadrzaj::where('slug','=','x-koordinata')->update(['sadrzaj'=>$podaci->x]);
    Sadrzaj::where('slug','=','y-koordinata')->update(['sadrzaj'=>$podaci->y]);
    Korisnici::where('id','=',1)->update(['grad'=>$podaci->grad,'adresa'=>$podaci->adresa]);
    return json_encode(['msg'=>'Uspešno ste izvršili dodavanje.','check'=>1]);
    }



}