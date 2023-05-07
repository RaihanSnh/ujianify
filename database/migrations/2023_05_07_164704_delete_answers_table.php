<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up() : void
	{
		Schema::drop('answers');
	}

	/**
	 * Reverse the migrations.
	 */
	public function down() : void
	{
		Schema::create('answers', function(Blueprint $table) {
			$table->id();

			$table->foreignID('question_id')->references('id')->on('questions');
			$table->integer('priority')->default(0);
			$table->text('answer');
			$table->text('image_path')->nullable();
			$table->integer('score');

			$table->timestamps();
		});
	}
};
