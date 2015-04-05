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
		Schema::create('masyarakat', function(Blueprint $table)
		{
			$table->integer('id_user')->unsigned()->unique();
			$table->string('nama');
			$table->string('NIK');
			$table->text('alamat');
			$table->timestamps();
		});

		Schema::table('masyarakat', function(Blueprint $table)
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
		Schema::drop('masyarakat');
	}

}
