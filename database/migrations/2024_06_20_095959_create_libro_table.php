<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('libro', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->autoIncrement();
            $table->string('titulo');
            $table->string('autor');
            $table->text('descripcion')->nullable();
            $table->integer('stock')->default(0);
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('libro');
    }
    
};
