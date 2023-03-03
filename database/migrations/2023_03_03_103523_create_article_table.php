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
    public function up(): void
    {
        Schema::create('article', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("title",50);
            $table->string("image");
            $table->text("content");
            $table->unsignedInteger("kind")->default(1);
            $table->unsignedInteger("sort")->default(0);
            $table->unsignedTinyInteger("status")->default(1);
            $table->dateTime("created_at")->useCurrent();
            $table->dateTime("updated_at")->nullable()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('article');
    }
};
