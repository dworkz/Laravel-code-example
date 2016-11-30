<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_docs', function(Blueprint $table ) {

            $table->increments('id');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('path_to_doc');
            $table->integer('employee_id');
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
        Schema::drop('employee_docs');
    }
}
