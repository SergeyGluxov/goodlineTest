<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnLangPaste extends Migration
{
    /**Добавить столбец с **/
    public function up()
    {
        Schema::table('pastes', function (Blueprint $table) {
            $table->string('lang')->nullable()->default('auto');
        });
    }

    public function down()
    {
        Schema::table('pastes', function ($table) {
            $table->dropColumn('lang');
        });
    }
}
