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
        Schema::create('kehadirans', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique()->index();
            $table->string('nama');
            $table->string('nokp');
            $table->string('notel');
            $table->string('email');
            $table->unsignedBigInteger('acara_id');
            $table->foreign('acara_id')->references('id')->on('acara');
            $table->string('cert_id')->nullable()->index();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kehadirans');
    }
};
