<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //生成模拟数据
        $this->cateData();
        $this->industryData();
        $this->productData();


    }

    //产品分类模拟数据
    public function cateData()
    {
        DB::table('product_category')->truncate();
        $data = [
            ['id' => 1, 'category_name' => '抖音', 'category_code' => 'DY'],
            ['id' => 2, 'category_name' => '快手', 'category_code' => 'KS'],
            ['id' => 3, 'category_name' => '微信公众号', 'category_code' => 'WXGZH'],
        ];
        DB::table('product_category')->insert($data);

    }

    //产品行业数据
    public function industryData()
    {
        DB::table('product_industry')->truncate();
        $data = [
            ['industry_name' => '美女'],
            ['industry_name' => '帅哥'],
            ['industry_name' => '搞笑'],
            ['industry_name' => '音乐'],
            ['industry_name' => '段子'],
            ['industry_name' => '体育'],
            ['industry_name' => '舞蹈'],
            ['industry_name' => '萌娃'],
            ['industry_name' => '宠物'],
            ['industry_name' => '美食'],
            ['industry_name' => '游戏'],
            ['industry_name' => '创意'],
            ['industry_name' => '美妆'],
            ['industry_name' => '母婴'],
            ['industry_name' => '汽车'],
            ['industry_name' => '生活'],
            ['industry_name' => '体育'],
            ['industry_name' => '科技'],
            ['industry_name' => '教育'],
            ['industry_name' => '影视'],
            ['industry_name' => '文学'],
            ['industry_name' => '情感'],
            ['industry_name' => '旅行'],
            ['industry_name' => '摄影'],
            ['industry_name' => '美图'],
            ['industry_name' => '明星'],
            ['industry_name' => '动漫'],
            ['industry_name' => '户外'],
            ['industry_name' => '励志'],
            ['industry_name' => '穿搭'],
            ['industry_name' => '其他'],
            ['industry_name' => '本地'],
            ['industry_name' => '两性'],
            ['industry_name' => '星座'],
            ['industry_name' => '职场'],
            ['industry_name' => '种草'],
            ['industry_name' => '小技巧'],
            ['industry_name' => '测评'],
            ['industry_name' => '书单'],
            ['industry_name' => '玩具'],
            ['industry_name' => '故事'],
            ['industry_name' => '科普'],
            ['industry_name' => '商业'],
            ['industry_name' => '方案'],
        ];
        DB::table('product_industry')->insert($data);
    }

    //产品数据
    public function productData()
    {
        DB::table('products')->truncate();

        $data = [];

        for ($i = 0; $i < 100; $i++) {
            $temp = [];

            $temp['account'] = strtolower(Str::random(rand(5,20)));  // 5-20位随机数字+小写字母
            $temp['account_name'] = strtolower(Str::random(rand(5,20)));  // 5-20位随机数字+小写字母
            $temp['mobile'] = '';
            $temp['category_id'] = rand(1,3);   //随机分类
            if($temp['category_id'] ==1){
                $category_code = 'DY';
            }else if ($temp['category_id'] ==2){
                $category_code = 'KS';
            }else{
                $category_code = 'WX';
            }
            $temp['product_no'] = $category_code.rand(1000000,9000000).rand(1000000,9000000);  //产品编码 = 分类编码+14位随机数字

            $temp['industry_id'] = rand(1,25);   //随机行业
            $temp['product_price'] = rand(1,50)*1000;   //随机 1000 -20000的千整数
            $temp['fans_number'] = rand(50000,5000000);   //随机 2万到1千万
            $temp['fan_price'] = $temp['product_price'] / $temp['fans_number']; //保留6位小数
            $temp['thumb'] = rand(50000,50000000); //点赞数
            $temp['auth_type'] = 1;  //1 到3随机
            $temp['register_date'] = (2018+rand(1,3)).''.'-01-01';  //2018-2021年 随机一个日期
            $temp['is_live'] = rand(0,1);  //随机 0或1
            $temp['is_display_window'] = rand(0,1);  //随机 0或1
            $temp['violation_status'] = rand(1,3);  //随机 1或2或3
            array_push($data, $temp);
        }

        DB::table('products')->insert($data);
    }
}
