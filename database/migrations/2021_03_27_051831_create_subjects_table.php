<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->integer('subject_code')->unique();
            $table->integer('department_id');
            $table->string('semester_id');
            $table->double('total_mark');
            $table->double('tc')->nullable();
            $table->double('tf')->nullable();
            $table->double('pc')->nullable();
            $table->double('pf')->nullable();
            $table->double('cradit');
            $table->string('pass_mark')->default('40');
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
        Schema::dropIfExists('subjects');
    }
}
