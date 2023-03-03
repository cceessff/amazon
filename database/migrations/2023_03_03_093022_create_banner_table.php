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
        Schema::create('banner', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("title",50);
            $table->string("url",255);
            $table->string("image",255);
            $table->unsignedInteger("sort")->default(0);
            $table->tinyInteger("status")->default(1);
            $table->dateTime("created_at")->useCurrent();
            $table->dateTime("updated_at")->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banner');
    }
};
