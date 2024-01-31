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
        Schema::create('books', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('title');
            $table->longText('description')->nullable();
            $table->string('language', 10)->nullable();
            $table->string('cover')->nullable();
            $table->string('isbn', 13)->nullable();
            $table->integer('quantity')->default(1);
            $table->integer('borrowed')->default(0);

            $table->uuid('publisher_id')->nullable();
            $table->foreign('publisher_id')
                ->references('id')
                ->on('publishers')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
