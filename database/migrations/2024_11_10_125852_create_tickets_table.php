<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->renameColumn('descriptopn', 'description');
        });
    }
    
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->renameColumn('description', 'descriptopn');
        });
    }
};