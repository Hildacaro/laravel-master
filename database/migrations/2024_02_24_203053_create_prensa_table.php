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
        Schema::create('prensa', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date'); // o $table->datetime('date');
            $table->text('URL'); // Cambiado a 'text' para admitir texto largo
            $table->string('photo'); // Cambiado a 'binary' para admitir BLOB, puede almacenar imágenes en formato SVG, JPG, PNG
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prensa');
    }
};
