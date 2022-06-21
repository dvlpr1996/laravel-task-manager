<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up()
	{
		Schema::create('tasks', function (Blueprint $table) {
			$table->id();
			$table->string('title', 50);
			$table->boolean('status')->default(0);

			$table->foreignId('user_id')->constrained('users')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->foreignId('tag_id')->constrained('tags')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->foreignId('group_id')->constrained('groups')
				->onUpdate('cascade')
				->onDelete('cascade');

			$table->timestamp('due_date');
			$table->timestamp('completed_at')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('tasks');
	}
};
