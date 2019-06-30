<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',256);
            $table->string('phone',19);
            $table->string('email',150);
            $table->integer('position_id')->unsigned();
            $table->foreign('position_id')->references('id')->on('positions');
            $table->float('salary',15,2);
            $table->date('employment_date');
            $table->string('photo',20)->nullable();
            $table->timestamps();
            $table->integer('admin_created_id')->unsigned();
            $table->foreign('admin_created_id')->references('id')->on('users');
            $table->integer('admin_updated_id')->unsigned();
            $table->foreign('admin_updated_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
