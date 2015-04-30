<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKtpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_dukcapil_ktp', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('nik');
			$table->index('nik');
			$table->string('password');
			$table->string('nama');
			$table->string('username')->unique();
			$table->string('email');
			$table->string('kota_lahir');
			$table->date('tanggal_lahir');
			$table->string('jenis_kelamin');
			$table->string('gol_darah');
			$table->string('alamat');
			$table->integer('rt')->unsigned();
			$table->integer('rw')->unsigned();
			$table->string('kel_desa');
			$table->string('kec');
			$table->string('kota_kab');
			$table->integer('kode_pos')->unsigned();
			$table->string('agama');
			$table->string('status');
			$table->string('kewarganegaraan');
			$table->string('foto');
			$table->string('ttd');
			$table->date('tgl_kadaluarsa');
			$table->string('kota_dikeluarkan');
			$table->string('prov_dikeluarkan');
			$table->date('tgl_dikeluarkan');
			$table->string('role')->default('masyarakat');
			$table->timestamps();
			$table->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ppl_dukcapil_ktp');
	}

}
