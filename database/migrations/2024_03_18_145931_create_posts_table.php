<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_content', function (Blueprint $table){
            $table->id();
            $table->string('text')->nullable();
            $table->string('photo')->nullable();
            $table->string('like')->nullable();
            $table->integer('comments')->nullable();
            $table->integer('reposts')->nullable();
            $table->string('link');
            $table->string('group_id');
            $table->integer('post_id');
            $table->string('owner_id');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
