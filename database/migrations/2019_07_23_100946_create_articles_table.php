<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->unsigned()->comment('用户ID');
            $table->string('title')->default('')->comment('标题');
            $table->string('author')->default('')->comment('作者');
            $table->mediumText('content')->comment('文章内容');
            $table->string('keywords')->default('')->comment('关键词');
            $table->boolean('is_top')->default(0)->comment('是否置顶 1是 0否');
            $table->integer('reply_count')->unsigned()->default(0)->comment('评论数');
            $table->integer('view_count')->unsigned()->default(0)->comment('查看数');
            $table->boolean('is_reply')->default(1)->comment('是否允许评论 1是 0否');
            $table->string('slug')->default('')->comment('百度API翻译');
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
        Schema::dropIfExists('articles');
    }
}
