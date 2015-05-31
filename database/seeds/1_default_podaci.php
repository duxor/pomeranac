<?php
use App\Security;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\PravaPristupa;
use App\Korisnici;
use App\TipSadrzaja;
use App\Sadrzaj;
class DefaultPodaci extends Seeder{
    public function run(){

        PravaPristupa::insert([
            ['naziv' => 'Zabranjen'],
            ['naziv' => 'Gost'],
            ['naziv' => 'Analitičar'],
            ['naziv' => 'Moderator'],
            ['naziv' => 'Administrator'],
            ['naziv' => 'Kreator']
        ]);
        Korisnici::insert([
            [
                'pravapristupa_id' => 5,
                'prezime' => 'Administrator',
                'ime' => 'Administrator',
                'email' => 'admin@admin.com',
                'username' => 'admin',
                'password' => Security::generateHashPass('admin')
            ]
        ]);
        TipSadrzaja::insert([
            ['naziv' => 'tekst'],//1
            ['naziv' => 'mail'],//2
            ['naziv' => 'link'],//3
            ['naziv' => 'slika'],//4
            ['naziv' => 'galerija'],//5
            ['naziv' => 'koordinata']//6
        ]);
        Sadrzaj::insert([
            [//1
                'naslov' => 'Početna',
                'sadrzaj' => '<p>Tekst u pripremi.</p>',
                'slug' => 'pocetna',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 1
            ],
            [//2
                'naslov' => 'O nama',
                'sadrzaj' => '<p>Tekst u pripremi.</p>',
                'slug' => 'o-nama',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 1
            ],
            [//3
                'naslov' => 'Rasa Pomeranac',
                'sadrzaj' => '<p>Tekst u pripremi.</p>',
                'slug' => 'o-rasi',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 1
            ],
            [//4
                'naslov' => 'Pas Boo',
                'sadrzaj' => '<p>Tekst u pripremi.</p>',
                'slug' => 'o-psu',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 1
            ],
            [//5
                'naslov' => 'Galerija',
                'sadrzaj' => '<p>Tekst u pripremi.</p>',
                'slug' => 'galerija',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 1
            ],
            [//6
                'naslov' => 'Kontakt',
                'sadrzaj' => '<p>Tekst u pripremi.</p>',
                'slug' => 'kontakt',
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
            ],
            [
                'naslov' => 'Osnovni slider',
                'sadrzaj' => 'Fotografije osnovnog slidera se prikazuju na početnoj strani.',
                'slug' => 'osnovni-slider',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 5
            ]
        ]);
    }
}