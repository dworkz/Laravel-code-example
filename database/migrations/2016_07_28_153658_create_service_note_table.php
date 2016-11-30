<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceNoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_note', function(Blueprint $table) {

            $table->increments('id');
            $table->integer('parent_id')->default(0);
            $table->integer('employee_id');
            $table->string('name');
            $table->text('description');
            $table->boolean('is_archive')->default(0);
            $this->integer('company_id')->default(0);
            $table->text('visa_text');
            $table->boolean('is_accepted')->default(0);
            $table->timestamp('accepted_date');
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
        Schema::drop('service_note');
    }
}
