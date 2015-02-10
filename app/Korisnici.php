<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Korisnici extends Model {

	protected $table = 'korisnici';

    protected $fillable = ['id', 'prava_pristupa', 'prezime', 'ime', 'email', 'username', 'password', 'token', 'online', 'create_at', 'update_at'];

}
