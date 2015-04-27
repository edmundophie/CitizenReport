<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkpdTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ppl_citizenreport_skpd', function(Blueprint $table)
		{
			$table->integer('id_user')->unsigned()->unique();
			$table->string('nama');
			$table->text('alamat');
			$table->text('telp');
			$table->timestamps();
		});

		Schema::table('ppl_citizenreport_skpd', function(Blueprint $table)
		{
			$table->foreign('id_user')->references('id')->on('user')
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
		Schema::drop('ppl_citizenreport_skpd');
	}

}
