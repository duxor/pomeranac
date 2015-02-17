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
        DB::table('prava_pristupa')->insert($pravaPristupa);

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
        DB::table('korisnici')->insert($korisnici);

        $tipSadrzaja = [
            [//1
                'naziv' => 'tekst'
            ],
            [//2
                'naziv' => 'mail'
            ],
            [//3
                'naziv' => 'link'
            ],
            [//4
                'naziv' => 'slika'
            ],
            [//5
                'naziv' => 'galerija'
            ],
            [//6
                'naziv' => 'koordinata'
            ]
        ];
        DB::table('tip_sadrzaja')->insert($tipSadrzaja);

        $sadrzaji = [
            [
                'naslov' => '<h1>Početna</h1>',
                'sadrzaj' => '<p>Tekst u pripremi.</p>',
                'slug' => 'pocetna',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 1
            ],
            [
                'naslov' => '<h1>O nama</h1>',
                'sadrzaj' => '<p>Tekst u pripremi.</p>',
                'slug' => 'o-nama',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 1
            ],
            [
                'naslov' => '<h1>Rasa Pomeranac</h1>',
                'sadrzaj' => '<p>Tekst u pripremi.</p>',
                'slug' => 'o-rasi',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 1
            ],
            [
                'naslov' => '<h1>Pas Boo</h1>',
                'sadrzaj' => '<p>Tekst u pripremi.</p>',
                'slug' => 'o-psu',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 1
            ],
            [
                'naslov' => '<h1>Galerija</h1>',
                'sadrzaj' => '<p>Tekst u pripremi.</p>',
                'slug' => 'galerija',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 1
            ],
            [
                'naslov' => '<h1>Kontakt</h1>',
                'sadrzaj' => '<p>Tekst u pripremi.</p>',
                'slug' => 'kontakt',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 1
            ],
            [
                'naslov' => null,
                'sadrzaj' => 'Kontaktirajte nas',
                'slug' => 'pocetna-link-1',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 1
            ],
            [
                'naslov' => null,
                'sadrzaj' => '44.796885',
                'slug' => 'x-koordinata',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 6
            ],
            [
                'naslov' => null,
                'sadrzaj' => '20.4700183',
                'slug' => 'y-koordinata',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 6
            ]
        ];
        DB::table('sadrzaj')->insert($sadrzaji);
    }
}