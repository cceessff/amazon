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
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("order_sn",50);
            $table->unsignedDecimal("order_amount",10)->default(0)->comment("订单金额");
            $table->unsignedDecimal("order_ratio",10)->default(0);
            $table->unsignedDecimal("order_profit",10)->default(0)->comment("订单收益");
            $table->tinyInteger("pay_status")->default(0);
            $table->unsignedBigInteger("member_id")->comment("会员id");
            $table->unsignedInteger("member_level")->comment("会员等级");
            $table->string("username")->comment("会员username");
            $table->string("product_title",50);
            $table->string("product_image");
            $table->unsignedDecimal("product_price",10)->default(0);
            $table->unsignedInteger("group_id")->default(0);
            $table->unsignedInteger("group_rule_id")->default(0);
            $table->unsignedInteger("group_rule_type")->default(1);
            $table->dateTime("freeze_time")->nullable();
            $table->dateTime("freeze_end_time")->nullable();
            $table->tinyInteger("status")->default(1)->comment("状态:1=>未完成,2=>未结算,3=>已完成,4=>已冻结");
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
        Schema::dropIfExists('order');
    }
};
