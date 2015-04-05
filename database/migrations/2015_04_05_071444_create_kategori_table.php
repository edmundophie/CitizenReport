<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKategoriTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('kategori', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nama');
			$table->text('deskripsi');
			$table->integer('id_skpd')->unsigned();
			$table->timestamps();
		});

		Schema::table('kategori', function(Blueprint $table)
		{
			$table->foreign('id_skpd')->references('id_user')->on('skpd');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('kategori');
	}

}
