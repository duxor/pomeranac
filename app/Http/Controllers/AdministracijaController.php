<?php namespace App\Http\Controllers;

use App\Sadrzaj;
use \Illuminate\Http\Request;
use App\Security;

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
    public function index()
    {
        return view('stranice.administracija.pocetna');
    }

    public function login()
    {
        return view('stranice.administracija.login');
    }

    public function oNama()
    {
        return view('stranice.administracija.o-nama');
    }

    public function oNamaPost(Sadrzaj $sdr)
    {
        $sadrzaj = new Sadrzaj();
        $sadrzaj->naslov = $sdr.naslov;
        return view('stranice.administracija.o-nama');
    }

    public function galerijaFotografija()
    {
        return view('stranice.administracija.galerija-fotografija');
    }

    public function testLogin(Request $request){
        $sec = new Security();
        $sec->setRedirectUrl('/administracija/login');

        return $sec->login($request->get('username'),$request->get('password'))?
            redirect('/administracija/pocetna')
            :
            view('stranice.administracija.poruke',['poruka'
            => '<h1>Pogrešan unos!</h1><a href="/administracija/login" class="btn btn-lg btn-danger">Pokušajte ponovo</a>']);
    }
}
