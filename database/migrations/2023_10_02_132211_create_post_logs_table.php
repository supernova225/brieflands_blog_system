<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('post_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('modifier_id')->nullable();
            $table->string('modifier_first_name');
            $table->string('modifier_last_name');
            $table->enum('modify_type', ['update', 'delete']);
            $table->foreignId('post_id')->nullable();
            $table->foreignId('author_id')->nullable();
            $table->string('author_first_name');
            $table->string('author_last_name');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_logs');
    }
};
