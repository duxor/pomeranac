<?php namespace App;
/**
 * Created by PhpStorm.
 * User: Andrija
 * Date: 07-Feb-15
 * Time: 22:30
 */
use Illuminate\Database\Eloquent\Model;

class TipSadrzaja extends Model  {


    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tip_sadrzaja';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','naziv'];

}