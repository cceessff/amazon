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
        Schema::create('account_record', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->unsignedBigInteger("member_id");
            $table->unsignedDecimal("amount",10,2);
            $table->unsignedDecimal("balance",10,2);
            $table->unsignedTinyInteger("trans_type");
            $table->unsignedTinyInteger("trade_type");
            $table->string("remark")->nullable();
            $table->dateTime("created_at")->useCurrent();
            $table->dateTime("updated_at")->useCurrentOnUpdate()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('account_record');
    }
};
