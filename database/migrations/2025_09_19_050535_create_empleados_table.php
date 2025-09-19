<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->unique();
            $table->char('sexo', 1);
            $table->unsignedBigInteger('area_id');
            $table->boolean('boletin')->default(false);
            $table->text('descripcion');
            $table->timestamps();
            
            $table->foreign('area_id')->references('id')->on('areas')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};