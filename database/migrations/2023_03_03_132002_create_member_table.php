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
        Schema::create('member', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("username",50)->unique();
            $table->string("password");
            $table->string("trade_password");
            $table->string("nickname",50);
            $table->string("icon")->nullable();
            $table->string("mobile",20);
            $table->unsignedInteger("country_code");
            $table->unsignedInteger("level_id");
            $table->unsignedInteger("agent_id")->nullable();
            $table->unsignedInteger("order_count")->default(0);
            $table->string("invite_code",20)->nullable();
            $table->string("last_login_ip",50)->nullable();
            $table->dateTime("last_login_time")->nullable();
            $table->unsignedTinyInteger("status")->default(1);
            $table->dateTime("created_at")->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member');
    }
};
