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
        Schema::create('member_address', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("member_id");
            $table->string("name",50);
            $table->string("mobile",20);
            $table->string("address");
            $table->string("zip_code",20);
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
        Schema::dropIfExists('member_address');
    }
};
