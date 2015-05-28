<?php

use Illuminate\Database\Seeder;
use App\OsnovneMetode;
class TestniPodaci extends Seeder {
    public function run(){
        $sadrzaji = [
            [
                'naslov' => 'Test galerija 1',
                'sadrzaj' => 'Testni tekst. Testni tekst. Testni tekst. Testni tekst. Testni tekst. Testni tekst. Testni tekst. Testni tekst. Testni tekst. Testni tekst. Testni tekst. Testni tekst. ',
                'slug' => 'test-g-1',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 5
            ],
            [
                'naslov' => 'Test galerija 2',
                'sadrzaj' => 'Testni tekst. Testni tekst. Testni tekst. Testni tekst. Testni tekst. Testni tekst. Testni tekst. Testni tekst. Testni tekst. Testni tekst. ',
                'slug' => 'test-g-2',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 5
            ],
            [
                'naslov' => 'Test galerija 3',
                'sadrzaj' => 'Testni tekst. Testni tekst. Testni tekst. Testni tekst. Testni tekst. Testni tekst. Testni tekst. Testni tekst. ',
                'slug' => 'test-g-3',
                'korisnici_id' => 1,
                'tip_sadrzaja_id' => 5
            ]
        ];
        DB::table('sadrzaj')->insert($sadrzaji);
    }
}