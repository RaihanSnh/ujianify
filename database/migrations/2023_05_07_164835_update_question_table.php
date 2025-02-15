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
		Schema::table('questions', function(Blueprint $table) {
			$table->enum('answer', ['A', 'B', 'C', 'D', 'E']);
			$table->integer('score');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down() : void
	{
		Schema::table('questions', function(Blueprint $table) {
            $table->dropColumn(['answer', 'score']);
        });
	}
};
