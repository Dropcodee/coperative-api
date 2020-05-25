<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->enum('employment_type', ['student', 'staff', 'working'])->default('working');
            $table->string('monthly_income')->nullable();
            $table->string('employment_idcard')->nullable();
            $table->string('employer_phone_number')->nullable();
            $table->string('employment_docs')->nullable();
            $table->string('company_address')->nullable();
            $table->string('employer_address')->nullable();
            $table->string('staff_number')->nullable();
            $table->string('student_monthly_allowance')->nullable();
            $table->date('student_year_admission')->nullable();
            $table->string('student_matric_number')->nullable();
            $table->string('student_institution')->nullable();
            $table->string('student_admission_letter')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('employments');
    }
}
