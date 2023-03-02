<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * create_time:null
        deleted:0
        description:null

        update_time:"2022-11-20 11:46:44"
         */
        Schema::create('product', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("title",100)->nullable(false)->index("idx_title");
            $table->string("description")->nullable();
            $table->decimal("price",10,2)->default(0)->nullable(false)->index("idx_price");
            $table->string("image",255)->nullable(false);
            $table->integer("sale_nums",false,true)->default(0);
            $table->integer("level",false,true)->default(1);
            $table->integer("sort",false,true)->default(0);
            $table->tinyInteger("status",false,true)->default(1);
            $table->tinyInteger("deleted",false,true)->default(0);
            $table->dateTime("created_at")->useCurrent()->nullable();
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
        Schema::dropIfExists('product');
    }
}

;
