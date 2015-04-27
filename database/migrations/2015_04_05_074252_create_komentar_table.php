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
		Schema::create('ppl_citizenreport_komentar', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_pengaduan')->unsigned();
			$table->integer('id_komentator')->unsigned();
			$table->text('komentar');
			$table->timestamps();
		});

		Schema::table('ppl_citizenreport_komentar', function(Blueprint $table)
		{
			$table->foreign('id_pengaduan')->references('id')->on('ppl_citizenreport_pengaduan');
			$table->foreign('id_komentator')->references('id')->on('ppl_citizenreport_user');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_citizenreport_komentar');
	}

}
