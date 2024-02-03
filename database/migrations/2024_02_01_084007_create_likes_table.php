<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('profile_picture_id');
            $table->timestamps();

            // Add a unique constraint on user_id and profile_picture_id
            $table->unique(['user_id', 'profile_picture_id']);

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('profile_picture_id')->references('id')->on('profile_pictures');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
}
