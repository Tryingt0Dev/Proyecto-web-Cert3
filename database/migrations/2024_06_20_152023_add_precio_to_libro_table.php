<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
{
    Schema::table('libro', function (Blueprint $table) {
        $table->decimal('precio', 8, 2)->after('stock')->nullable();
    });
}

public function down()
{
    Schema::table('libro', function (Blueprint $table) {
        $table->dropColumn('precio');
    });
}

};