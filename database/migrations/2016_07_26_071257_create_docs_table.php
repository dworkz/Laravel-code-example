<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docs', function(Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->text('description');
            $table->string('path_to_doc');
            $table->integer('company_id');
            $table->integer('person_id');
            $table->integer('note_id');
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
        Schema::drop('docs');
    }
}
