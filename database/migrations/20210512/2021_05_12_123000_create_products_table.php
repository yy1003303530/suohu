<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //产品分类表
        Schema::create('product_category', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('id 如1=抖音,2=快手,3=微信公众号');
            $table->string('category_name', 16)->default('')->comment('产品类型名称:如 抖音，公从号，快手等');
            $table->string('category_code', 8)->default('')->comment('产品类型编码:如 抖音=DY，快手=KS');
            $table->timestamps();
            $table->softDeletes();
        });


        //产品行业表
        Schema::create('product_industry', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('id 如 1=搞笑,2=美女,3=教育');
            $table->string('industry_name', 16)->default('')->comment('产品类型名称:如搞笑，美女，教育等');
            $table->timestamps();
            $table->softDeletes();
        });


        //产品表
        //价格  粉丝数  点赞数  商品编码  帐号 帐号名称  帐号  帐号认证类型  粉丝类型  卖家描述 温馨提示
        //注册时间  直播权限  橱窗功能  违规状态   产品价格  单粉价格
        Schema::create('products', function (Blueprint $table) {
            $table->id()->autoIncrement()->comment('id');
            $table->string('product_no', 32)->default('')->index()->unique()->comment('产品编号');
            $table->string('account', 64)->index()->comment('帐号，如抖音号');
            $table->string('account_name', 64)->nullable()->default('')->index()->comment('帐号名称，如抖音号名称');
            $table->string('mobile', 32)->default('')->comment('绑定的手机号');
            $table->string('email', 32)->default('')->comment('绑定的email');
            $table->unsignedSmallInteger('category_id')->default(1)->comment('产品分类id');
            $table->unsignedSmallInteger('industry_id')->default(1)->comment('产品行业id');
            $table->float('product_price', 18,2)->default(0)->comment('产品价格');
            $table->unsignedBigInteger('fans_number')->default(0)->comment('粉丝数量');
            $table->float('fan_price', 12,6)->default(0)->comment('单粉价格');
            $table->unsignedBigInteger('thumb')->default(0)->comment('账户总的点赞数量');
            $table->unsignedSmallInteger('auth_type')->default(1)->comment('账户认证类型 1=未认证，2=个人认证，3=企业认证');
            $table->dateTime('register_date')->comment('账户注册时间');
            $table->boolean('is_live')->default(false)->comment('是否有直播权限');
            $table->boolean('is_display_window')->default(false)->comment('是否有橱窗');
            $table->boolean('violation_status')->default(false)->comment('违规状态 1=没有违规 2=有违规，3=违规恢复');
            $table->text('description')->nullable()->comment('卖家描述');
            $table->text('notice')->nullable()->comment('温馨提示');
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
        Schema::dropIfExists('product_category');
        Schema::dropIfExists('product_industry');
        Schema::dropIfExists('products');
    }
}
