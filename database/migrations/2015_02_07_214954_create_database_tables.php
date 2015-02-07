<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDatabaseTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tip_sadrzaja', function(Blueprint $table)
		{
			$table->increments('id');
            $table->string('naziv', 45);
            $table->timestamps();
		});

        Schema::create('sadrzaj', function(Blueprint $table)
        {
            $table->increments('id');
            $table->text('sadrzaj');
            $table->string('slug', 45);
            $table->integer('tip_sadrzaja_id')->unsigned();
            $table->foreign('tip_sadrzaja_id')->references('id')->on('tip_sadrzaja');
            $table->timestamps();
        });

        Schema::create('prava_pristupa', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('naziv', 45);
            $table->timestamps();
        });

        Schema::create('korisnici', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('prava_pristupa_id')->unsigned();
            $table->foreign('prava_pristupa_id')->references('id')->on('prava_pristupa');
            $table->string('prezime', 45);
            $table->string('ime', 45);
            $table->string('email', 45);
            $table->string('username', 45);
            $table->string('password', 45);
            $table->string('token', 45);
            $table->string('online', 45);
            $table->timestamps();
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
