<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJudgmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('judgments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('post_id')->unsigned();
            $table->string('range1')->default("100点");
            $table->string('range2')->default("75点");
            $table->string('range3')->default("50点");
            $table->string('range4')->default("25点");
            $table->string('range5')->default("0点");
            $table->string('range_text1')->default("すごい！");
            $table->string('range_text2')->default("あと少し！");
            $table->string('range_text3')->default("まぁまぁ");
            $table->string('range_text4')->default("うーん。。。");
            $table->string('range_text5')->default("残念！");
            $table->string('range_img1')->nullable();
            $table->string('range_img2')->nullable();
            $table->string('range_img3')->nullable();
            $table->string('range_img4')->nullable();
            $table->string('range_img5')->nullable();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->foreign('post_id')
                    ->references('id')
                    ->on('posts')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('judgments');
    }
}
