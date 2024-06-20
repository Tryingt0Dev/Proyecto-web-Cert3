<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('libro_orden', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('libro_id');
            $table->unsignedBigInteger('orden_id');
            $table->integer('cantidad');
            $table->foreign('orden_id')->references('id')->on('ordenes');
            $table->foreign('libro_id')->references('id')->on('libro')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('libro_orden');
    }
};
