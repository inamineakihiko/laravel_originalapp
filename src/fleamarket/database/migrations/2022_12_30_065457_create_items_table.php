<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('status');
            $table->string('shippingmethod');
            $table->string('sender');
            $table->string('deliverytime');
            $table->string('category');
            $table->text('content');
            $table->string('item_image');
            $table->string('prices');
            $table->string('postage');
            $table->timestamps();
            $table->softDeletes();
            $table->bigInteger('user_id')->unsigned();

                // 外部キーを設定する
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
