<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grade_points', function (Blueprint $table) {
            $table->id();
            $table->string('grade_name')->nullable();
            $table->double('grade_point')->nullable();
            $table->double('start_mark')->nullable();
            $table->double('end_mark')->nullable();
            $table->double('start_point')->nullable();
            $table->double('end_point')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('grade_points');
    }
}
