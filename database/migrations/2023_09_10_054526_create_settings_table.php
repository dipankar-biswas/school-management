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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->string("address")->nullable();
            $table->string("logo")->nullable();
            $table->string("email")->nullable();
            $table->string("phone")->nullable();
            $table->text("maps")->nullable();
            $table->string("emimage")->nullable();
            $table->string("banner")->nullable();
            $table->string("bannerlink")->nullable();
            $table->text("keywords")->nullable();
            $table->text("metadescription")->nullable();
            $table->text("about")->nullable();
            $table->text("likepage")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
