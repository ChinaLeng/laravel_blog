<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->string('ip')->default('')->comment('留言IP');
            $table->string('email')->default('')->comment('邮箱');
            $table->string('url')->default('')->comment('网站');
            $table->integer('pid')->unsigned()->default(0)->comment('父级id');
            $table->text('content')->comment('内容');
            $table->boolean('status')->comment('1:已审核 0：未审核');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
}
