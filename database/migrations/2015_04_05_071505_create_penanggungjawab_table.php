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
		Schema::create('ppl_citizenreport_penanggungjawab', function(Blueprint $table)
		{
			$table->integer('id_kategori')->unsigned();
			$table->integer('id_skpd')->unsigned();
			$table->timestamps();
		});

		Schema::table('ppl_citizenreport_penanggungjawab', function(Blueprint $table)
		{
			$table->foreign('id_kategori')->references('id')->on('ppl_citizenreport_kategori')
					->onDelete('cascade');
			$table->foreign('id_skpd')->references('id_user')->on('ppl_citizenreport_skpd')
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
		Schema::drop('ppl_citizenreport_penanggungjawab');
	}

}
