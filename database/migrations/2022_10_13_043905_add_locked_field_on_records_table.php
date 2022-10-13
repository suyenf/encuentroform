<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLockedFieldOnRecordsTable extends Migration
{
    public function up()
    {
        Schema::table('records', function (Blueprint $table) {
            $table->boolean('locked')->after('email')->default(false);
        });
    }

    public function down()
    {
        Schema::dropColumns('records',['locked']);
    }
}
