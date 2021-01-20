<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table)
        {
            $table->id();
            $table->text('heading');
            $table->text('intro');
            $table->text('point1');
            $table->text('point2')->nullable();
            $table->text('point3')->nullable();
            $table->text('end');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('abouts');
    }
}
