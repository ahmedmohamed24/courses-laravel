<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title',100);
            $table->string('briefDesc',150);
            $table->text('desc');
            $table->float('price',6,2);
            $table->string('img',100);
            $table->foreignId('cat_id');
            $table->foreign('cat_id')->references('id')->on('categories');
            $table->foreignId('instructor_id');
            $table->foreign('instructor_id')->references('id')->on('instructors');
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
        Schema::dropIfExists('courses');
    }
}
