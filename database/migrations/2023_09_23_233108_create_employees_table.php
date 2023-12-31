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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("designation")->nullable();
            $table->string("mobail")->nullable();
            $table->string("email")->nullable();
            $table->string("address")->nullable();
            $table->string("priority")->nullable();
            $table->string("image")->nullable();
            $table->integer("category")->nullable();
            $table->integer("status")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
