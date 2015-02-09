<?php namespace App\Http\Controllers;

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

    public function galerijaFotografija()
    {
        return view('stranice.administracija.galerija-fotografija');
    }
}
