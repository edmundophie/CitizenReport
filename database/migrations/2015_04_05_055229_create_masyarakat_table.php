<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasyarakatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_citizenreport_masyarakat', function(Blueprint $table)
		{
			$table->integer('id_user')->unsigned()->unique();
			$table->string('nama');
			$table->string('NIK');
			$table->text('alamat');
			$table->timestamps();
		});

		Schema::table('ppl_citizenreport_masyarakat', function(Blueprint $table)
		{
			$table->foreign('id_user')->references('id')->on('ppl_citizenreport_user')
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
		Schema::drop('ppl_citizenreport_masyarakat');
	}

}
