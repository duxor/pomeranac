<?php namespace App\Http\Controllers\Administracija;
use App\Http\Controllers\Controller; 

use App\Sadrzaj;
use App\Korisnici;
use App\TipSadrzaja;
use App\OsnovneMetode;
use App\Security;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Input;

class Administracija extends Controller {
public function getTest(){
    OsnovneMetode::kreirjFolder('slike/galerije/test-g-1');
    OsnovneMetode::kreirjFolder('slike/galerije/test-g-2');
    OsnovneMetode::kreirjFolder('slike/galerije/test-g-3');

    $fotografije = OsnovneMetode::listaFajlova("slike/test");
        foreach($fotografije as $k => $foto){
            copy("slike/test/{$foto}","slike/galerije/test-g-1/{$foto}");
            copy("slike/test/{$foto}","slike/galerije/test-g-2/{$foto}");
            copy("slike/test/{$foto}","slike/galerije/test-g-3/{$foto}");
        }
}
//LOGIN
    public function getLogin(){
        return redirect('/login');
    }
//INDEX
    public function getIndex(){
        return Security::autentifikacija('administracija.index', null);
    }
//
    public function getSadrzaj($slug)
    {
        $sadrzaj = Sadrzaj::where('slug','=',$slug)->get(['id','naslov','slug','sadrzaj'])->first()->toArray();  
        return Security::autentifikacija('administracija.sadrzaji', compact('sadrzaj'));
    }
    public function getKontakt()
    {
        $korisnici=Korisnici::where('id','=',1)->get(['grad','adresa'])->first();
        $sadrzaj = Sadrzaj::where('slug','=','kontakt')->get(['id','naslov','slug','sadrzaj'])->first()->toArray();
        $sadrzaj['x'] = Sadrzaj::where('slug','=','x-koordinata')->get(['sadrzaj'])->first()->sadrzaj;
        $sadrzaj['y'] = Sadrzaj::where('slug','=','y-koordinata')->get(['sadrzaj'])->first()->sadrzaj;
        return Security::autentifikacija('administracija.sadrzaji', compact('sadrzaj','korisnici'));
    }

    public function postSadrzaj()
    {
        if(Security::autentifikacijaTest()){
            $sadrzaj = Sadrzaj::where('id','=',Input::get('id'))->get(['id','naslov','sadrzaj'])->first();
            $sadrzaj->naslov = Input::get('naslov');
            $sadrzaj->sadrzaj = Input::get('sadrzaj');
            $sadrzaj->save();
            if(Input::get('x')){
                $sadrzaj = Sadrzaj::where('slug','=','x-koordinata')->get(['id','sadrzaj'])->first();
                $sadrzaj->sadrzaj = Input::get('x');
                $sadrzaj->save();
                $sadrzaj = Sadrzaj::where('slug','=','y-koordinata')->get(['id','sadrzaj'])->first();
                $sadrzaj->sadrzaj = Input::get('y');
                $sadrzaj->save();
            }
            return Redirect::back();
        }
        return Security::rediectToLogin();
    }/*
    public function getGalerije()
    {
        $galerije = Sadrzaj::where('tip_sadrzaja_id','=',5)->get(['naslov','slug','sadrzaj','aktivan'])->toArray();
        foreach($galerije as $k => $galerija)
            $galerije[$k]['slike'] = OsnovneMetode::listaFotografija("slike/galerije/{$galerija['slug']}");
        return Security::autentifikacija('administracija.galerije', compact('galerije'));
    }
    public function postGalerija(){
        if(Security::autentifikacijaTest()){
            if(OsnovneMetode::kreirjFolder('slike/galerije/'.Input::get('slug'))){
                $galerija = new Sadrzaj();
                $galerija->korisnici_id = Session::get('id');
                $galerija->tip_sadrzaja_id = 5;
                $galerija->slug = Input::get('slug');
            }
            else $galerija = Sadrzaj::where('slug','=',Input::get('slug'))->get(['id','naslov','sadrzaj'])->first();

            $galerija->naslov = Input::get('naslov');
            $galerija->sadrzaj = Input::get('sadrzaj');
            $galerija->save();
            return Redirect::back();
        }
        return Security::rediectToLogin();
    }
    public function getGalerijaStatus($slug){
        if(Security::autentifikacijaTest()){
            $galerija = Sadrzaj::where('slug','=',$slug)->get(['id','aktivan'])->first();
            $galerija->aktivan = $galerija->aktivan==1?0:1;
            $galerija->save();
            return Redirect::back();
        }
        return Security::rediectToLogin();
    }
    public function getGalerijaObrisi($slug){
        if(Security::autentifikacijaTest()){
            Sadrzaj::destroy(Sadrzaj::where('slug','=',$slug)->get(['id'])->first()->id);
            OsnovneMetode::ukloniFolder('slike/galerije/'.$slug);
            return Redirect::back();
        }
        return Security::rediectToLogin();
    }
    public function getGalerija($slug){
        $podaci = Sadrzaj::where('slug','=',$slug)->get(['slug','naslov','sadrzaj'])->first()->toArray();
        $podaci['slike'] = OsnovneMetode::listaFotografija("slike/galerije/{$slug}");
        return Security::autentifikacija('administracija.galerija',compact('podaci'));
    }
    public function postUkloniSliku(){
        if(Security::autentifikacijaTest()){
            $test=unlink(Input::get('slika'));
            return ['msg'=>$test?'Uspešno ste uklonili fotografiju.':'Desila se greška, pokušajte ponovo. Ukoliko se problem bude ponovio kontaktirajte administratora.','check'=>$test?1:0];
        }
        return Security::rediectToLogin();
    }*/
    public function getRefresh(){
        return Redirect::back();
    }
/////////////

    public function galerijaFotoUpload(Request $request)
    {
        $file = $request->file('file');
        $galerija = $request->get('galerija');
        //dd($request->get('file'));
        $destinationPath = public_path() . '/slike/galerije/' . $galerija;
        // If the uploads fail due to file system, you can try doing public_path().'/uploads'
        $filename = $request->get('galerija') . "-" . str_random(12);
        //$filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $upload_success = $file->move($destinationPath, $filename . "." . $extension);

        if( $upload_success ) {
            return null;
        } else {
            return Response::json('error', 400);
        }
        //return redirect('/administracija/galerija-fotografija');
    }
    public function postUploadVideo()
    {
        if (empty($_FILES['images'])) {
            echo json_encode(['error'=>'No files found for upload.']);
            return;
        }

        $images = $_FILES['images'];
        $folder = isset($_POST['folder']) ? $_POST['folder'] : '';
        $success = null;
        $paths= [];
        $filenames = $images['name'];
        for($i=0; $i < count($filenames); $i++){
            $ext = explode('.', basename($filenames[$i]));
            $target = "slike/galerije/";
            if(move_uploaded_file($images['tmp_name'][$i], '../'. $target. $folder. $images['name'][$i])) {
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
            $output = ['error'=>'Error while uploading images. Contact the system administrator'];
        // delete any uploaded files
            foreach ($paths as $file) {
                unlink($file);
            }
        } else {
            $output = ['error'=>'No files were processed.'];
        }
        echo json_encode($output);
        return;
    }

    public function galerijaDodaj(Request $request)
    {
        $slug = $request->get('slug');
        $tip_sadrzaja_id = TipSadrzaja::where('naziv', 'galerija')->first()->id;
        $sadrzaj = new Sadrzaj();
        $sadrzaj->fill([
            'naslov' => $request->get('naslov'),
            'slug' => $slug,
            'tip_sadrzaja_id' => $tip_sadrzaja_id,
            'korisnici_id' => Session::get('id')
        ])->save();
        mkdir(public_path() . '/slike/galerije/' . $slug, 0755, true);
        return redirect('/administracija/galerija-fotografija');
    }

    public function galerijaPrikaz($slug)
    {
        return view('administracija.galerija-prikaz')->withSlug($slug);
    }

    public function testLogin(Request $request){
        $sec = new Security();
        $sec->setRedirectURL(['/administracija/pocetna', '/administracija/login']);
        return $sec->login($request->get('username'),$request->get('password'));
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
    public function kontakt()
    {
        return view('administracija.kontakt');
    }

    public function kontaktPost(Request $request)
    {
//        $tip_sadrzaja_id = TipSadrzaja::where('naziv', 'galerija')->first()->id;
//        $sadrzaj = new Sadrzaj();
//        $sadrzaj->fill([
//            'naslov' => $request->get('naslov'),
//            'slug' => $slug,
//            'tip_sadrzaja_id' => $tip_sadrzaja_id,
//            'korisnici_id' => Session::get('id')
//        ])->save();
        return http_redirect('/administracija/kontakt');
    }

}
