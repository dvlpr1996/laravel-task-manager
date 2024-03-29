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
            $table->string('name', 128);
            $table->string('description', 512)->nullable();
            $table->tinyInteger('status')->comment('0: undone, 1: done')->default(0);
            $table->date('due_date')->nullable();
            $table->tinyInteger('reminder')->comment('0: unset, 1: set')->default(0);

            $table->foreignId('user_id')->constrained('users')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('group_id')->constrained('groups')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreignId('priority_id')->constrained('priorities')
            ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
