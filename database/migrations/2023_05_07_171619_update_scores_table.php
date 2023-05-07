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
		Schema::table('scores', function(Blueprint $table) {
			$table->dateTime('submitted_at')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down() : void
	{
		Schema::table('scores', function(Blueprint $table) {
			$table->dropColumn('submitted_at');
		});
	}
};
