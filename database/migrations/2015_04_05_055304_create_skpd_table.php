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
		Schema::create('skpd', function(Blueprint $table)
		{
			$table->integer('id_user')->unsigned()->unique();
			$table->string('nama');
			$table->text('alamat');
			$table->text('telp');
			$table->timestamps();
		});

		Schema::table('skpd', function(Blueprint $table)
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
		Schema::drop('skpd');
	}

}
