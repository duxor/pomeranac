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
                'naslov' => 'Pomeranac',
                'sadrzaj' => '<p>Od sada pas Boo rase Pomeranac pronašao je svoj dom u Srbiji. Odgajivačnica Kaličanin bogatija je sa novim članovima, reč je o rasi za kojom je poludela planeta...(<u><b>vrlo kratak tekst</b></u> koji govori o uzgajivačnici)</p>',
                'slug' => 'pocetna1',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 1
            ],
            [//2
                'naslov' => 'Prvi Pomeranac u Srbiji',
                'sadrzaj' => '<p>Imate čast da upoznate psa o kome se toliko priča i koji je prvi Pomeranac u Srbiji. Ova izuzetno popularna rasa, poreklom je iz...</p>',
                'slug' => 'pocetna2',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 1
            ],
            [//3
                'naslov' => 'O nama',
                'sadrzaj' => '<p>Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. </p><p>Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. </p>',
                'slug' => 'o-nama',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 1
            ],
            [//4
                'naslov' => 'Pomeranac',
                'sadrzaj' => '<p>Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. </p><p>Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. </p>',
                'slug' => 'o-rasi',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 1
            ],
            [//5
                'naslov' => 'Boo',
                'sadrzaj' => '<p>Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. </p><p>Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. </p>',
                'slug' => 'o-psu',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 1
            ],
            [//6
                'naslov' => 'Galerija',
                'sadrzaj' => '<p>Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. </p><p>Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. Tekst u pripremi. </p>',
                'slug' => 'galerija',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 1
            ],
            [//7
                'naslov' => 'Kontakt',
                'sadrzaj' => '<p>Tekst u pripremi.</p>',
                'slug' => 'kontakt',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 1
            ],
            [
                'naslov' => null,
                'sadrzaj' => '44.796885',
                'slug' => 'y-koordinata',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 6
            ],
            [
                'naslov' => null,
                'sadrzaj' => '20.4700183',
                'slug' => 'x-koordinata',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 6
            ],
            [
                'naslov' => 'Osnovni slider',
                'sadrzaj' => 'Fotografije osnovnog slidera se prikazuju na početnoj strani.',
                'slug' => 'osnovni-slider',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 5
            ],
            /////////////////
            [
                'naslov' => 'Facebook stranica',
                'sadrzaj' => 'http://facebook.com',
                'slug' => 'facebook',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 3
            ],
            [
                'naslov' => 'Twitter nalog',
                'sadrzaj' => 'http://twitter.com',
                'slug' => 'twitter',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 3
            ],
            [
                'naslov' => 'Google+ nalog',
                'sadrzaj' => 'http://google.com',
                'slug' => 'google',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 3
            ]
        ]);
    }
}