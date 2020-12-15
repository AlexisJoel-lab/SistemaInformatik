<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToProformas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('proformas', function (Blueprint $table) {            
            $table->string('kit')->after('id');
            $table->string('precio')->after('kit');
            $table->string('nombre')->after('precio');
            $table->string('correo')->after('nombre');
            $table->string('celular')->after('correo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('proformas', function (Blueprint $table) {
            $table->dropColumn('kit');
            $table->dropColumn('precio');
            $table->dropColumn('nombre');
            $table->dropColumn('correo');
            $table->dropColumn('celular');
        });
    }
}
