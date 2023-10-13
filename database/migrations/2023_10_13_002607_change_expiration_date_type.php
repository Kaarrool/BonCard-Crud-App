<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

    class ChangeExpirationDateType extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->dateTime('expiration_date')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->date('expiration_date')->change();
        });
    }
};
