<?php
/**
 * Created by PhpStorm.
 * User: Dušan
 * Date: 2/10/2015
 * Time: 4:59 PM
 */

use App\Security;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultPodaci extends Seeder{
    public function run(){
        $pravaPristupa = [
            [
                'naziv' => 'Zabranjen'
            ],
            [
                'naziv' => 'Moderator'
            ],
            [
                'naziv' => 'Administrator'
            ],
            [
                'naziv' => 'Korisnik'
            ]
        ];

        $security = new Security();
        $korisnici = [
            [
                'prava_pristupa_id' => 3,
                'prezime' => 'Administrator',
                'ime' => 'Administrator',
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'password' => $security->generateHashPass('admin')
            ]
        ];

        DB::table('prava_pristupa')->insert($pravaPristupa);
        DB::table('korisnici')->insert($korisnici);
    }
}