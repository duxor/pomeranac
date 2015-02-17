<?php namespace App\Http\Controllers;

use App\Sadrzaj;

class GlavniController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Glavni Controller
	|--------------------------------------------------------------------------
	|
	|
	|
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
		$pocetna = Sadrzaj::all(['slug', 'naslov', 'sadrzaj'])->where('slug','pocetna')->first();
		$pLink = Sadrzaj::all(['slug', 'naslov', 'sadrzaj'])->where('slug','pocetna-link-1')->first();
		$oNama = Sadrzaj::all(['slug', 'naslov', 'sadrzaj'])->where('slug','o-nama')->first();
		$oRasi = Sadrzaj::all(['slug', 'naslov', 'sadrzaj'])->where('slug','o-rasi')->first();
		$oPsu = Sadrzaj::all(['slug', 'naslov', 'sadrzaj'])->where('slug','o-psu')->first();
		$galerija = Sadrzaj::all(['slug', 'naslov', 'sadrzaj'])->where('slug','galerija')->first();
		$kontakt = Sadrzaj::all(['slug', 'naslov', 'sadrzaj'])->where('slug','kontakt')->first();
		$x = Sadrzaj::all(['slug', 'sadrzaj'])->where('slug','x-koordinata')->first()->sadrzaj;
		$y = Sadrzaj::all(['slug','sadrzaj'])->where('slug','y-koordinata')->first()->sadrzaj;

		return view('stranice.pocetna', [
			'meni' => [1 => 'Početna', 2 => 'O nama', 3 => 'Rasa Pomeranac', 4 => 'Pas Boo', 5 => 'Galerija', 6 => 'Kontakt' ],
			'pozadina' => [1 => 'slike/9.jpg', 2 => 'slike/8.jpg', 3 => 'slike/3.jpg', 4 => 'slike/4.jpg', 5 => 'slike/11.jpg', 6 => 'slike/10.jpg' ],
			'pocetnaNaslov' => $pocetna->naslov,
			'pocetnaTekst' => $pocetna->sadrzaj,
			'pocetnaLink' => $pLink->sadrzaj,
			'oNamaNaslov' => $oNama->naslov,
			'oNamaTekst' => $oNama->sadrzaj,
			'rasaPomeranacNaslov' => $oRasi->naslov,
			'rasaPomeranacTekst' => $oRasi->sadrzaj,
			'pasBooNaslov' => $oPsu->naslov,
			'pasBooTekst' => $oPsu->sadrzaj,
			'galerijaNaslov' => $galerija->naslov,
			'galerijaTekst' => $galerija->sadrzaj,
			'kontaktNaslov' => $kontakt->naslov,
			'kontaktTekst' => $kontakt->sadrzaj,
			'x' => $x,
			'y' => $y
		]);
	}

}
