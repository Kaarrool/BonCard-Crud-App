<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeCardNumberType extends Migration
{
    public function up()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->string('card_number', 20)->change();
        });
    }

    public function down()
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->bigInteger('card_number')->change();
        });
    }
};

