<?php namespace App\Http\Controllers;

use App\Sadrzaj;
use App\TipSadrzaja;
use \Illuminate\Http\Request;
use App\Security;
use Illuminate\Support\Facades\Session;

class AdministracijaController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Glavni Controller
    |--------------------------------------------------------------------------
    |
    |
    |
    */
    /**
     * Created by PhpStorm.
     * User: Andrija
     * Date: 09-Feb-15
     * Time: 18:23
     *
     * Edit: duXor
     * Date: 10-Feb-15
     * Time:23:21
     */
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//	public function __construct()
//	{
//		$this->middleware('auth');
//	}

    /**
     * Show the application dashboard to the user.
     *
     * @return Response
     */

    public function login()
    {
        return view('stranice.administracija.login');
    }

    public function index()
    {
        return $this->autentifikacija('stranice.administracija.pocetna', null);
    }

    public function oNama(Sadrzaj $sadrzaj)
    {
        return $this->autentifikacija('stranice.administracija.o-nama', ['naslov'=>'Naslov', 'sadrzaj' => $sadrzaj]);
    }

    public function oNamaPost(Request $request)
    {
        $slug = $request->get('slug');
        $tip_sadrzaja_id = TipSadrzaja::where('naziv', 'tekst')->first()->id;
        $sadrzaj = Sadrzaj::where('slug', $slug)->first();
        $sadrzaj->fill([
            'naslov' => $request->get('naslov'),
            'slug' => $request->get('slug'),
            'sadrzaj' => $request->get('sadrzaj'),
            'tip_sadrzaja_id' => $tip_sadrzaja_id,
            'korisnici_id' => Session::get('id')
        ])->save();
        return redirect('/administracija/pocetna');
    }
    public function galerijaFotografija()
    {
        return $this->autentifikacija('stranice.administracija.galerija-fotografija', null);
    }
    public function testLogin(Request $request){
        $sec = new Security();
        $sec->setRedirectURL(['/administracija/pocetna', '/administracija/login']);

        return $sec->login($request->get('username'),$request->get('password'));
//            ?
//            redirect('/administracija/pocetna')
//            :
//            view('stranice.administracija.poruke',['poruka'
//            => '<h1>Pogrešan unos!</h1><a href="/administracija/login" class="btn btn-lg btn-danger">Pokušajte ponovo</a>']);
    }
    public function logout(){
        $sec = new Security();
        $sec->setRedirectURL('/administracija/login');
        return $sec->logout();
    }
    public function autentifikacija($target, $dodaci){
        $sec = new Security();
        $sec->setRedirectURL('/administracija/login');
        return $sec->autentifikacija($target, $dodaci);
    }

}
