<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenanggungjawabTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('penanggungjawab', function(Blueprint $table)
		{
			$table->integer('id_kategori')->unsigned();
			$table->integer('id_skpd')->unsigned();
			$table->timestamps();
		});

		Schema::table('penanggungjawab', function(Blueprint $table)
		{
			$table->foreign('id_kategori')->references('id')->on('kategori')
					->onDelete('cascade');
			$table->foreign('id_skpd')->references('id_user')->on('skpd')
					->onDelete('cascade');						
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('penanggungjawab');
	}

}
