<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('slug','256');
            $table->string('title','256');
            $table->unsignedBigInteger('type')->default(0)->comment("0=video,1=book");
            $table->unsignedBigInteger('resources')->default(1)->comment('Resource Count');
            $table->unsignedBigInteger('duration')->default(0)->comment('0=1-5 hours,1=5-10 hours,2 = 10+hours');
            $table->year('year');
            $table->float('price')->default(0.00);
            $table->longText('description');
            $table->string('image_url','256')->nullable();
            $table->text('link');
            $table->foreignId('submitted_by')->constrained('users')->onDelete('cascade');
            $table->unsignedBigInteger('platform_id');
            $table->unsignedBigInteger('level_id');
            $table->timestamps();


            $table->foreign('platform_id')->references('id')->on('platforms')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
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
};
