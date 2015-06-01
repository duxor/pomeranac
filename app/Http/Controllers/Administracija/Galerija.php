<?php namespace App\Http\Controllers\Administracija;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Korisnici;
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
	public function postUkloniFoto(){
		if(!Security::autentifikacijaTest(2,'min'))return Security::rediectToLogin();
		if(!Korisnici::find(Session::get('id')))return Security::rediectToLogin();
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
	//Popuna podataka o odredjenoj galeriji
	public function postGalerijaUpdate(){
		if(!Security::autentifikacijaTest(4,'min'))Security::rediectToLogin();
		Sadrzaj::where('slug',Input::get('slug'))->update(['sadrzaj'=>Input::get('tekst')]);
		return'OK'.Input::get('slug').Input::get('tekst');
	}
}
