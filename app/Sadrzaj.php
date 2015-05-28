<?php
/**
 * Created by PhpStorm.
 * User: Andrija
 * Date: 10-Feb-15
 * Time: 22:52
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class Sadrzaj extends Model {
    protected $table = 'sadrzaj';
    protected $fillable = ['naslov','slug','sadrzaj','korisnici_id','tip_sadrzaja_id','aktivan'];
} 