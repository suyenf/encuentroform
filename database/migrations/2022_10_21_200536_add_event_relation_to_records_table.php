<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEventRelationToRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // mañana
    {
//         2014_10_12_000000_create_users_table.php
//         2014_10_12_100000_create_password_resets_table.php
//         2019_08_19_000000_create_failed_jobs_table.php
//         2019_12_14_000001_create_personal_access_tokens_table.php
//         2022_10_12_142648_create_records_table.php
//         2022_10_13_003248_create_people_table.php
//         2022_10_13_043905_add_locked_field_on_records_table.php
//         2022_10_21_174751_create_events_table.php  << se crea aqui
//         2022_10_21_200536_add_event_relation_to_records_table.php  << estamos aqui :)
        Schema::table('records', function (Blueprint $table) { // boca
            $table->foreignId('event_id')->nullable()->constrained(); // asi se coloca un "diente  ?"
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() //noche
    {
        Schema::table('records', function (Blueprint $table) { // boca
            $table->dropConstrainedForeignId('event_id'); // asi se saca un "diente  ?"
        });
    }
}
