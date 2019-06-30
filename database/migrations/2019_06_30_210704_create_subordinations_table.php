<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubordinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subordinations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('head_id')->unsigned();
            $table->foreign('head_id')->references('id')->on('employees');
            $table->integer('inferior_id')->unsigned();
            $table->foreign('inferior_id')->references('id')->on('employees');
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
        Schema::dropIfExists('subordinations');
    }
}
