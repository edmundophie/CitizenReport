<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomentarTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('komentar', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_pengaduan')->unsigned();
			$table->integer('id_komentator')->unsigned();
			$table->text('komentar');
			$table->timestamps();
		});

		Schema::table('komentar', function(Blueprint $table)
		{
			$table->foreign('id_pengaduan')->references('id')->on('pengaduan');
			$table->foreign('id_komentator')->references('id')->on('user');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('komentar');
	}

}
