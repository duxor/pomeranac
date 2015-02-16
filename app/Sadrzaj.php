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
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'sadrzaj';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['naslov','slug','sadrzaj','korisnici_id','tip_sadrzaja_id'];

} 