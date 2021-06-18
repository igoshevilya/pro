<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotographersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photographers', function (Blueprint $table) {
            $table->bigIncrements('id');            
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('gallery_id'); 
            $table->string('spec', 100);
            $table->string('dopspec');
            $table->unsignedInteger('price')->nullable();
            $table->string('gender')->nullable();
            $table->unsignedInteger('experience');
            $table->text('about');            
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
        Schema::dropIfExists('photographers');
    }
}
