<?php namespace App\Http\Controllers;

use App\OsnovneMetode;
use App\Sadrzaj;
use App\TextEditor as text;
use Illuminate\Support\Facades\Input;

class Glavni extends Controller {

    private function meni(){
        return Sadrzaj::skip(2)->take(5)->get(['naslov'])->toArray();
    }
	public function getIndex()
	{
		$pocetna = Sadrzaj::where('slug','Like','pocetna%')->get(['slug','naslov','sadrzaj'])->toArray();
		$oNama = Sadrzaj::all(['slug', 'naslov', 'sadrzaj'])->where('slug','o-nama')->first();
		$oRasi = Sadrzaj::all(['slug', 'naslov', 'sadrzaj'])->where('slug','o-rasi')->first();
		$oPsu = Sadrzaj::all(['slug', 'naslov', 'sadrzaj'])->where('slug','o-psu')->first();
		$galerija = Sadrzaj::where('slug','galerija')->get(['slug', 'naslov', 'sadrzaj'])->first();

		$galerije = Sadrzaj::where('aktivan','=',1)->where('tip_sadrzaja_id','=',5)->where('slug','<>','osnovni-slider')->orderBy('id','desc')->take(3)->get(['slug','naslov'])->toArray();
		for($i=0;$i<sizeof($galerije);$i++){
            $foto=OsnovneMetode::listaFotografija('slike/galerije/'.$galerije[$i]['slug']);
            $galerije[$i]['foto'] = sizeof($foto)?$foto[rand(0,sizeof($foto)-1)]:null;
        }

		$kontakt = Sadrzaj::all(['slug', 'naslov', 'sadrzaj'])->where('slug','kontakt')->first();
		$x = Sadrzaj::all(['slug', 'sadrzaj'])->where('slug','x-koordinata')->first()->sadrzaj;
		$y = Sadrzaj::all(['slug','sadrzaj'])->where('slug','y-koordinata')->first()->sadrzaj;
		$sliderIMGs = OsnovneMetode::listaFotografija('slike/galerije/osnovni-slider');
        $sliderIMGsIndikatori = '';
        $sliderIMGsFoto = '';
        foreach($sliderIMGs as $k=>$foto){
            $sliderIMGsIndikatori.='<li data-target="#slajderFoto" data-slide-to="'.$k.'"'.($k==0?'class="active"':'').'></li>';
            $sliderIMGsFoto .= '<div class="item '.($k==0?'active':'').'"><img src="'.$foto.'" alt="Pomeranac fotografija '.$k.'"></div>';
        }
		return view('pocetna', [
			'meni' => $this->meni(),
			'pozadina' => [1 => 'slike/9.jpg', 2 => 'slike/8.jpg', 3 => 'slike/3.jpg', 4 => 'slike/4.jpg', 5 => 'slike/11.jpg', 6 => 'slike/10.jpg' ],
			'pocetna' => $pocetna,
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
			'sliderIMGs' => ['indikatori' => $sliderIMGsIndikatori, 'foto' => $sliderIMGsFoto],
			'galerije' => $galerije,
            'drustveneMreze'=>Sadrzaj::where('tip_sadrzaja_id',3)->take(3)->get(['naslov','slug','sadrzaj'])->toArray()
		]);
	}
	public function getSveGalerije(){
        $galerija = Sadrzaj::where('slug','galerija')->get(['slug', 'sadrzaj'])->first();
        $galerije = Sadrzaj::where('aktivan','=',1)->where('tip_sadrzaja_id','=',5)->where('slug','<>','osnovni-slider')->orderBy('id','desc')->get(['slug','naslov'])->toArray();
		for($i=0;$i<sizeof($galerije);$i++){
            $foto=OsnovneMetode::listaFotografija('slike/galerije/'.$galerije[$i]['slug']);
            $galerije[$i]['foto'] = sizeof($foto)?$foto[rand(0,sizeof($foto)-1)]:null;
        }
        $meni=$this->meni();
        return view('galerije.pregled-svih',compact('galerija','galerije','meni'));
    }
	public function postGalerija(){
        return json_encode(['foto'=>OsnovneMetode::listaFotografija('slike/galerije/'.Input::get('slug')),
                            'text'=>Sadrzaj::where('slug',Input::get('slug'))->get(['sadrzaj'])->first()->sadrzaj]);
    }
    public function postPosaljiMail(){
        return json_encode(['msg'=>'Uspešno ste poslali poruku.','check'=>1]);
    }
}