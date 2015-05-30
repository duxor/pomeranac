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

        Schema::create('pravapristupa', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('naziv', 45);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('korisnici', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pravapristupa_id');
            $table->foreign('pravapristupa_id')->references('id')->on('pravapristupa');
            $table->string('prezime', 45)->nullable();
            $table->string('ime', 45)->nullable();
            $table->string('email', 45);
            $table->string('username', 45);
            $table->string('password', 100);
            $table->string('token', 255)->nullable();
            $table->boolean('online')->default(false);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable();
        });
        Schema::create('log', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->timestamp('create_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->unsignedBigInteger('korisnici_id');
            $table->foreign('korisnici_id')->references('id')->on('korisnici');
        });
        
        Schema::create('tip_sadrzaja', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->string('naziv', 45);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('sadrzaj', function(Blueprint $table)
        {
            $table->bigIncrements('id');
            $table->text('naslov', 45)->nullable();
            $table->string('slug', 45)->nullable();
            $table->text('sadrzaj');
            $table->unsignedBigInteger('korisnici_id');
            $table->foreign('korisnici_id')->references('id')->on('korisnici');
            $table->unsignedBigInteger('tip_sadrzaja_id')->unsigned();
            $table->foreign('tip_sadrzaja_id')->references('id')->on('tip_sadrzaja');
            $table->tinyInteger('aktivan')->default(0);
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable();
        });


	}
	public function down()
	{
		Schema::drop('tip_sadrzaja');
        Schema::drop('sadrzaj');
        Schema::drop('korisnici');
        Schema::drop('pravapristupa');
        Schema::drop('log');
	}

}
