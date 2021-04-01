<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeAssignLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_assign_leaves', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id');
            $table->integer('cl')->nullable();
            $table->integer('ml')->nullable();
            $table->integer('lwp')->default('0');
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
        Schema::dropIfExists('employee_assign_leaves');
    }
}
