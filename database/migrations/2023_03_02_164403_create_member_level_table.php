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
        Schema::create('member_level', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedInteger("level")->index("idx_level");
            $table->string("title",20);
            $table->string("icon");
            $table->string("image");
            $table->unsignedDecimal("commission_rate",10)->default(0)->comment("佣金比例");
            $table->unsignedInteger("order_num")->default(0);
            $table->unsignedDecimal("upgrade_amount",10)->default(0);
            $table->unsignedDecimal("min_order_price",10);
            $table->unsignedDecimal("max_order_price",10);
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
        Schema::dropIfExists('member_level');
    }
};
