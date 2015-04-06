<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengaduanTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pengaduan', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('judul');
			$table->integer('id_kategori')->unsigned();
			$table->string('lampiran')->nullable();
			$table->text('deskripsi');
			$table->integer('id_masyarakat')->unsigned();
			$table->integer('id_status')->unsigned();
            $table->string('komentar_status')->nullable();
			$table->string('laporan')->nullable();
			$table->text('feedback')->nullable();
            $table->string('komentar_feedback')->nullable();
			$table->timestamps();
		});

		Schema::table('pengaduan', function(Blueprint $table) {
			$table->foreign('id_kategori')->references('id')->on('kategori');
			$table->foreign('id_masyarakat')->references('id_user')->on('masyarakat');
			$table->foreign('id_status')->references('id')->on('status');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pengaduan');
	}

}
