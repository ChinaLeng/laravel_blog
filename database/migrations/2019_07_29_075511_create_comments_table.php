<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id')->comment('主键id');
            $table->integer('social_users_id')->unsigned()->default(0)->comment('评论用户id 关联social_users表的id');
            $table->boolean('type')->default(1)->comment('1：文章评论');
            $table->integer('pid')->unsigned()->default(0)->comment('父级id');
            $table->integer('article_id')->unsigned()->comment('文章id');
            $table->text('content')->comment('内容');
            $table->boolean('status')->comment('1:已审核 0：未审核');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
