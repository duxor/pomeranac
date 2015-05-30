<?php
/**
 * Created by PhpStorm.
 * User: Dušan
 * Date: 3/15/2015
 * Time: 2:29 PM
 */

namespace App;

class OsnovneMetode {
    public static function listaFajlova($folder){
        $exclude = array( ".","..","error_log","_notes" );
        $lista = scandir($folder);
        foreach($lista as $k=>$v)
            if(in_array($v, $exclude)) unset($lista[$k]);
        return $lista;
    }
    public static function listaFotografija($folder){
        return glob($folder.'/*.{jpg,jpeg,png,gif}',GLOB_BRACE);;
    }
    public static function kreirjFolder($adresa){
        if (!is_dir($adresa)) return mkdir($adresa, 0755, true);
        return false;
    }
    public static function postojeFajlovi($adresa){
        return sizeof(OsnovneMetode::listaFotografija($adresa));
    }
    public static function ukloniFolder($dirname) {
        if (is_dir($dirname))
            $dir_handle = opendir($dirname);
        if (!$dir_handle)
            return false;
        while($file = readdir($dir_handle)) {
            if ($file != "." && $file != "..") {
                if (!is_dir($dirname."/".$file))
                    unlink($dirname."/".$file);
                else
                    OsnovneMetode::ukloniFolder($dirname.'/'.$file);
            }
        }
        closedir($dir_handle);
        rmdir($dirname);
        return true;
    }
    public static function ukloniFajl($adresa){
        unlink($adresa);
    }
//    public static function kreirajInicijalneFoldereZaApp($slug){
//        OsnovneMetode::kreirjFolder("aplikacije/{$slug}/slike/osnovne");
//        OsnovneMetode::kreirjFolder("aplikacije/{$slug}/slike/galerije");
//        OsnovneMetode::kreirjFolder("aplikacije/{$slug}/fajlovi");
//    }
//    public static function kopirajInicijalneFajlove($slug,$tema){
//        $appID = Aplikacija::where('slug','=',$slug)->get(['id'])->first()->id;
//
//        OsnovneMetode::kreirjFolder("aplikacije/{$slug}/slike/osnovne/{$tema}/pozadine");
//        $fotografije = OsnovneMetode::listaFotografija("temlejt/{$tema}/pozadine");
//        foreach($fotografije as $k => $foto){
//            $slika = "aplikacije/{$slug}/slike/osnovne/{$tema}/pozadine/{$slug}-".$foto;
//            Sadrzaj::insert([
//                'naslov'=>'Osnovna pozadina '.($k-1),
//                'slug' => "pozadina-{$tema}",
//                'sadrzaj'=>$slika,
//                'tipsadrzaja_id'=>4,
//                'aplikacija_id'=>$appID
//            ]);
//            copy("temlejt/{$tema}/pozadine/".$foto,$slika);
//        }
//
//        OsnovneMetode::kreirjFolder("aplikacije/{$slug}/slike/osnovne/{$tema}/slider");
//        $fotografije = OsnovneMetode::listaFotografija("temlejt/{$tema}/slider");
//        foreach($fotografije as $k => $foto){
//            $slika = "aplikacije/{$slug}/slike/osnovne/{$tema}/slider/{$slug}-".$foto;
//            Sadrzaj::insert([
//                'naslov'=>'Naslov slajdera '.($k-1),
//                'slug' => $slika,
//                'sadrzaj'=>"Tekst slajdera.",
//                'tipsadrzaja_id'=>5,
//                'aplikacija_id'=>$appID
//            ]);
//            copy("temlejt/{$tema}/slider/".$foto,$slika);
//        }
//    }
}
