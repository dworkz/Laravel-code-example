<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company', function(Blueprint $table) {

            $table->increments('id');
            /*
             * 1 - партнер
             * 2 - конртагент
             * 3 - покупатель
             */
            $table->integer('type_id'); ///
            $table->boolean('is_businessman')->default(0);
            $table->text('name');
            $table->string('short_name');
            $table->text('description');
            $table->string('inn');
            $table->string('kpp'); //
            $table->string('ogrn');
            $table->string('reestr_number');
            $table->string('okpo');
            $table->string('okved');
            $table->text('additional_info');
            $table->text('bank_details');
            $table->string('site');
            $table->boolean('is_archive')->default(0); ///
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('company');
    }
}
