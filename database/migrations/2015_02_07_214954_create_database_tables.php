<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateDatabaseTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

        Schema::create('prava_pristupa', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('naziv', 45);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::create('korisnici', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('prava_pristupa_id')->unsigned();
            $table->foreign('prava_pristupa_id')->references('id')->on('prava_pristupa');
            $table->string('prezime', 45)->nullable();
            $table->string('ime', 45)->nullable();
            $table->string('email', 45);
            $table->string('username', 45);
            $table->string('password', 100);
            $table->string('token', 255)->nullable();
            $table->boolean('online')->default(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::create('tip_sadrzaja', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('naziv', 45);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

        Schema::create('sadrzaj', function(Blueprint $table)
        {
            $table->increments('id');
            $table->text('naslov', 45)->nullable();
            $table->string('slug', 45)->nullable();
            $table->text('sadrzaj');
            $table->integer('korisnici_id')->unsigned()->foreign('korisnici_id')->references('id')->on('korisnici');
            $table->integer('tip_sadrzaja_id')->unsigned()->foreign('tip_sadrzaja_id')->references('id')->on('tip_sadrzaja');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
        });

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('tip_sadrzaja');
        Schema::drop('sadrzaj');
        Schema::drop('korisnici');
        Schema::drop('prava_pristupa');
	}

}
