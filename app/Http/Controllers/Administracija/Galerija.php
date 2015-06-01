<?php namespace App\Http\Controllers\Administracija;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Sadrzaj;
use App\Security;
use App\OsnovneMetode;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Request;
class Galerija extends Controller {
	public function getVideo( $galerijaSlug, $nazivFajla ) {
		$path = "slike/galerije/{$galerijaSlug}/{$nazivFajla}.mp4";
		$contentType='mp4';
		$fullsize = filesize($path);
		$size = $fullsize;
		$stream = fopen($path, "r");
		$response_code = 200;
		$headers = array("Content-type" => $contentType);
		$range = Request::header('Range');
		if($range != null) {
			$eqPos = strpos($range, "=");
			$toPos = strpos($range, "-");
			$unit = substr($range, 0, $eqPos);
			$start = intval(substr($range, $eqPos+1, $toPos));
			$success = fseek($stream, $start);
			if($success == 0) {
				$size = $fullsize - $start;
				$response_code = 206;
				$headers["Accept-Ranges"] = $unit;
				$headers["Content-Range"] = $unit . " " . $start . "-" . ($fullsize-1) . "/" . $fullsize;
			}
		}
		$headers["Content-Length"] = $size;
		return Response::stream(function () use ($stream) {
			fpassthru($stream);
		}, $response_code, $headers);
	}

	//Pregled svih galerija
	public function getIndex(){
		if(!Security::autentifikacijaTest(4,'min')) return Security::rediectToLogin();
		$podaci['galerije']=Sadrzaj::where('tip_sadrzaja_id',5)->get(['naslov','slug','sadrzaj'])->toArray();
		return Security::autentifikacija('galerije.index', compact('podaci'));
	}
	public function postListaFotografija(){
		if(!Security::autentifikacijaTest(4,'min')) return Security::rediectToLogin();
		return json_encode(['foto'=>OsnovneMetode::listaFotografija(Input::get('folder')),'video'=>OsnovneMetode::listaFajlovaSamoIme(Input::get('folder'))]);
	}
	public function postUkloniFoto($slugApp){
		if(!Security::autentifikacijaTest(2,'min'))return Security::rediectToLogin();
		if(!Nalog::where('slug',$slugApp)->where('korisnici_id',Session::get('id'))->get())return Security::rediectToLogin();
		return json_encode(['msg'=>(unlink(Input::get('link')))?'OK':'GRESKA']);
	}
	//Upload fotografija
	public function postUpload(){
		if(!Security::autentifikacijaTest(2,'min')){
			echo json_encode(['error'=>'Niste prijavljeni na platformu.']);
			return;
		}
		if (empty($_FILES['images'])) {
			echo json_encode(['error'=>'Nisu pronađeni fajlovi za upload.']);
			return;
		}
		$images = $_FILES['images'];
		$folder = isset($_POST['folder']) ? $_POST['folder'] : '';
		$success = null;
		$paths= [];
		$filenames = $images['name'];
		for($i=0; $i < count($filenames); $i++){
			$ext = explode('.', basename($filenames[$i]));
			$target = $folder;
			if(move_uploaded_file($images['tmp_name'][$i], $folder. $images['name'][$i])){
				$success = true;
				$paths[] = $target;
			} else {
				$success = false;
				break;
			}
		}
		if ($success === true) {
			$output = '[]';
		} elseif ($success === false) {
			$output = ['error'=>'Greška prilikom upload-a. Kontaktirajte tehničku podršku platforme.'];
			foreach ($paths as $file) {
				unlink($file);
			}
		} else {
			$output = ['error'=>'Fajlovi nisu procesuirani.'];
		}
		echo json_encode($output);
		return;
	}



/*
	//Pregled svih galerija
	public function getIndex_x($slugApp){
		if(!Security::autentifikacijaTest(4)) return Security::rediectToLogin();
		if(!Nalog::where('slug',$slugApp)->where('korisnici_id',Session::get('id'))->get(['id'])->first())return'Greska!';
		$podaci['galerije']=Sadrzaji::join('nalog','nalog.id','=','sadrzaji.nalog_id')
			->join('templejt','templejt.id','=','sadrzaji.templejt_id')
			->join('tema','tema.id','=','nalog.tema_id')
			->where('nalog.aktivan',1)
			->where('nalog.korisnici_id',Session::get('id'))
			->whereBetween('templejt.vrsta_sadrzaja_id',[7,9])
			->get(['nalog.naziv as app','sadrzaji.id','tema.slug as slugTema','sadrzaji.naziv','templejt.slug','sadrzaj','templejt.vrsta_sadrzaja_id'])->toArray();
		foreach($podaci['galerije'] as $k => $galerija)
			$podaci['galerije'][$k]['slike'] = OsnovneMetode::listaFotografija(OsnovneMetode::folderGalerije($galerija['vrsta_sadrzaja_id'],$galerija['slug'],$slugApp,$galerija['slugTema']));

		$podaci['aplikacije']=OsnovneMetode::aplikacije();
		$podaci['aplikacija']=$slugApp;
		return Security::autentifikacija('moderacija.galerije.pregled', compact('podaci'));
	}
	//Pregled odredjene galerije
	public function anyGalerija($slugApp,$sadrzajId,$slugGalerije=null){
		if (!Security::autentifikacijaTest(4))return Security::rediectToLogin();
		$podaci['aplikacije']=OsnovneMetode::aplikacije();
		$podaci['galerija']=Sadrzaji::join('templejt','templejt.id','=','sadrzaji.templejt_id')
			->join('tema','tema.id','=','templejt.tema_id')
			->where('sadrzaji.id',$sadrzajId)->get(['templejt.slug','sadrzaji.id','sadrzaji.naziv','sadrzaj','vrsta_sadrzaja_id','tema.slug as slugTema'])->first()->toArray();
		$podaci['folder']=OsnovneMetode::folderGalerije($podaci['galerija']['vrsta_sadrzaja_id'],$podaci['galerija']['slug'],$slugApp,$podaci['galerija']['slugTema']);
		$podaci['slike'] =OsnovneMetode::listaFotografija($podaci['folder']);
		$podaci['slugApp']=$slugApp;
		return Security::autentifikacija('moderacija.galerije.galerija', compact('podaci'));
	}
	//Fizicko BRISANJE odredjene fotografije iz galerije
	public function postUkloniFoto_OLD($slugApp){
		if(!Security::autentifikacijaTest())return Security::rediectToLogin();
		if(!Nalog::where('slug',$slugApp)->where('korisnici_id',Session::get('id'))->get())return Security::rediectToLogin();
		unlink(Input::get('slika'));
		return Redirect::back();
	}*/
	//Popuna podataka o odredjenoj galeriji
	public function postGalerijaUpdate(){
		$podaci=json_decode(Input::get('podaci'));
		if(!Security::autentifikacijaTest(4) or Session::get('id')!=$podaci->korisnik_id or !Sadrzaji::join('nalog','nalog.id','=','sadrzaji.nalog_id')->where('nalog.korisnici_id',Session::get('id'))->where('sadrzaji.id',$podaci->galerija_id)->get(['sadrzaji.id']))
			return json_encode(['msg'=>'Greska!!! Proverite podatke i obratite pažnju na legalnost onoga što radite.','check'=>0]);
		$galerija=Sadrzaji::where('id',$podaci->galerija_id)->update(['naziv'=>$podaci->naziv,'sadrzaj'=>$podaci->sadrzaj]);//find($podaci->galerija_id,['id','naziv','sadrzaj']);
		return json_encode(['msg'=>$galerija?'Uspešno ste ažurirali galeriju fotografija.':'Desila se greška. Proverite podatke i pokušjte ponovo.','check'=>$galerija?1:0]);
	}
}
