<?php namespace App\Http\Controllers;

use App\OsnovneMetode;
use App\Sadrzaj;
use App\TextEditor as text;

class Glavni extends Controller {

	public function getIndex()
	{
		$meni = Sadrzaj::get(['naslov'])->take(6)->toArray();
		$pocetna = Sadrzaj::all(['slug', 'naslov', 'sadrzaj'])->where('slug','pocetna')->first();
		$oNama = Sadrzaj::all(['slug', 'naslov', 'sadrzaj'])->where('slug','o-nama')->first();
		$oRasi = Sadrzaj::all(['slug', 'naslov', 'sadrzaj'])->where('slug','o-rasi')->first();
		$oPsu = Sadrzaj::all(['slug', 'naslov', 'sadrzaj'])->where('slug','o-psu')->first();
		$galerija = Sadrzaj::all(['slug', 'naslov', 'sadrzaj'])->where('slug','galerija')->first();

		$galerije = Sadrzaj::where('aktivan','=',1)->where('tip_sadrzaja_id','=',5)->where('slug','<>','osnovni-slider')->orderBy('id','desc')->take(2)->get(['slug','naslov','sadrzaj'])->toArray();
		for($i=0;$i<(sizeof($galerije)>2?2:sizeof($galerije));$i++) $galerije[$i]['foto'] = OsnovneMetode::listaFotografija('slike/galerije/'.$galerije[$i]['slug'])? OsnovneMetode::listaFotografija('slike/galerije/'.$galerije[$i]['slug'])[0]:null;

		$kontakt = Sadrzaj::all(['slug', 'naslov', 'sadrzaj'])->where('slug','kontakt')->first();
		$x = Sadrzaj::all(['slug', 'sadrzaj'])->where('slug','x-koordinata')->first()->sadrzaj;
		$y = Sadrzaj::all(['slug','sadrzaj'])->where('slug','y-koordinata')->first()->sadrzaj;
		$sliderIMGs = OsnovneMetode::listaFotografija('slike/galerije/osnovni-slider');
		return view('pocetna', [
			'meni' => $meni,
			'pozadina' => [1 => 'slike/9.jpg', 2 => 'slike/8.jpg', 3 => 'slike/3.jpg', 4 => 'slike/4.jpg', 5 => 'slike/11.jpg', 6 => 'slike/10.jpg' ],
			'pocetnaNaslov' => $pocetna->naslov,
			'pocetnaTekst' => text::readMore($pocetna->sadrzaj),
			'oNamaNaslov' => $oNama->naslov,
			'oNamaTekst' => text::readMore($oNama->sadrzaj),
			'rasaPomeranacNaslov' => $oRasi->naslov,
			'rasaPomeranacTekst' => text::readMore($oRasi->sadrzaj),
			'pasBooNaslov' => $oPsu->naslov,
			'pasBooTekst' => text::readMore($oPsu->sadrzaj),
			'galerijaNaslov' => $galerija->naslov,
			'galerijaTekst' => text::readMore($galerija->sadrzaj),
			'kontaktNaslov' => $kontakt->naslov,
			'kontaktTekst' => text::readMore($kontakt->sadrzaj),
			'x' => $x,
			'y' => $y,
			'sliderIMGs' => $sliderIMGs,
			'galerije' => $galerije
		]);
	}
	public function getGalerije(){
		$meni = $meni = Sadrzaj::get(['naslov'])->take(6)->toArray();
		$galerije = Sadrzaj::where('aktivan','=',1)->where('tip_sadrzaja_id','=',5)->where('slug','<>','osnovni-slider')->orderBy('id','desc')->get(['slug','naslov','sadrzaj'])->toArray();
		for($i=0;$i<sizeof($galerije);$i++) $galerije[$i]['foto'] = OsnovneMetode::listaFotografija('slike/galerije/'.$galerije[$i]['slug'])? OsnovneMetode::listaFotografija('slike/galerije/'.$galerije[$i]['slug'])[0]:null;
		$txt = Sadrzaj::where('slug','=','galerija')->get(['sadrzaj','naslov'])->first()->toArray();
		return view('galerije.galerije',compact('meni','galerije','txt'));
	}
	public function getGalerija($slug){
		$meni = $meni = Sadrzaj::get(['naslov'])->take(6)->toArray();
		$galerija = Sadrzaj::where('slug','=',$slug)->get(['naslov','slug','sadrzaj'])->first()->toArray();
		$galerija['foto'] = OsnovneMetode::listaFotografija("slike/galerije/{$slug}");
		return view('galerije.galerija',compact('meni','galerija'));
	}

}
