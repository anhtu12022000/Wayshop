<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class CateAndProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cate')->insert([
            ['id'=>1,'name'=>"Men's Fashion",'slug'=>Str::slug('men-fashion')],
            ['id'=>2,'name'=>"Women's Fashion",'slug'=>Str::slug('women-fashion')],
            ['id'=>3,'name'=>"Kid's Fashion",'slug'=>Str::slug('kid-fashion')],
            ['id'=>4,'name'=>'Shoes Fashion','slug'=>Str::slug('shoes')],
            ['id'=>5,'name'=>'Bags Fashion','slug'=>Str::slug('bags')]
        ]);
        DB::table('products')->insert([
            ['name'=>'Bộ thể thao','slug'=>Str::slug('Bộ thể thao'),'image'=>'https://cf.shopee.vn/file/e60adb2002b1f247840e45c9d8d0c2b6','description'=>'mô tả','price'=>100000,'sale'=>0,'detail'=>'nội dung chi tiết','quantity'=>10,'status'=>1,'slide_id'=>1,'cate_id'=>1],
            ['name'=>'Áo đôi Neon','slug'=>Str::slug('Áo đôi Neon'),'image'=>'https://cdn.vatgia.vn/pictures/fullsize/2016/05/07/wvq1462627250.jpg','description'=>'mô tả','price'=>100000,'sale'=>0,'detail'=>'nội dung chi tiết','quantity'=>10,'status'=>1,'slide_id'=>1,'cate_id'=>1],
            ['name'=>'Áo len nam cổ tròn','slug'=>Str::slug('Áo len nam cổ tròn'),'image'=>'http://aothudong.com/upload/product/atd-044/ao-len-nam-co-tron-han-quoc.jpg','description'=>'mô tả','price'=>100000,'sale'=>0,'detail'=>'nội dung chi tiết','quantity'=>10,'status'=>1,'slide_id'=>1,'cate_id'=>1],
            ['name'=>'Áo phông Power','slug'=>Str::slug('Áo phông Power'),'image'=>'https://cdn2.yame.vn/pimg/ao-thun-nam-y2010-basic-am04-0019542/29e8f005-35cd-1400-8e52-0016a7815ec0.jpg?w=540&h=756&c=true&ntf=false','description'=>'mô tả','price'=>100000,'sale'=>0,'detail'=>'nội dung chi tiết','quantity'=>10,'status'=>1,'slide_id'=>1,'cate_id'=>1],
            ['name'=>'Bộ combo hè nam','slug'=>Str::slug('Bộ combo hè nam'),'image'=>'https://tea-1.lozi.vn/v1/images/resized/ao-phong-the-thao-chat-lanh-cuc-mat-anh-that-1538814549-1-6241973-1538814549?w=480&type=s','description'=>'mô tả','price'=>100000,'sale'=>0,'detail'=>'nội dung chi tiết','quantity'=>10,'status'=>1,'slide_id'=>1,'cate_id'=>1],
            ['name'=>'Áo phông face','slug'=>Str::slug('Áo phông face'),'image'=>'https://znews-photo.zadn.vn/w660/Uploaded/lce_mdlwc/2019_09_09/hhh.jpg','description'=>'mô tả','price'=>100000,'sale'=>0,'detail'=>'nội dung chi tiết','quantity'=>10,'status'=>1,'slide_id'=>1,'cate_id'=>1],
            ['name'=>'Quần bò nữ','slug'=>Str::slug('Quần bò nữ'),'image'=>'https://i.pinimg.com/236x/88/88/79/8888798b0d06012aa29029065b041d1d.jpg','description'=>'mô tả','price'=>100000,'sale'=>0,'detail'=>'nội dung chi tiết','quantity'=>10,'status'=>1,'slide_id'=>1,'cate_id'=>1],
            ['name'=>'Áo phông art','slug'=>Str::slug('Áo phông art'),'image'=>'https://cdn3.yame.vn/pimg/ao-thun-nam-y2010-basic-am03-0019541/acefa827-2339-1300-ccc6-0016a7814391.jpg?w=540&h=756&c=true&ntf=false','description'=>'mô tả','price'=>100000,'sale'=>0,'detail'=>'nội dung chi tiết','quantity'=>10,'status'=>1,'slide_id'=>1,'cate_id'=>1],
            ['name'=>'Áo sơ mi nữ','slug'=>Str::slug('Áo sơ mi nữ'),'image'=>'https://www.remove.bg/assets/start_remove-79a4598a05a77ca999df1dcb434160994b6fde2c3e9101984fb1be0f16d0a74e.png','description'=>'mô tả','price'=>100000,'sale'=>0,'detail'=>'nội dung chi tiết','quantity'=>10,'status'=>2,'slide_id'=>1,'cate_id'=>2],
            ['name'=>'Áo khoác bò','slug'=>Str::slug('Áo khoác bò'),'image'=>'https://ae01.alicdn.com/kf/H19dfd3f743934d88b6da78598d24e44d2.jpg_q50.jpg','description'=>'mô tả','price'=>100000,'sale'=>0,'detail'=>'nội dung chi tiết','quantity'=>10,'status'=>2,'slide_id'=>1,'cate_id'=>2],
            ['name'=>'Áo phông X đen','slug'=>Str::slug('Áo phông X đen'),'image'=>'https://cf.shopee.vn/file/a214c674e958cc3e86bf1a024f160306','description'=>'mô tả','price'=>100000,'sale'=>0,'detail'=>'nội dung chi tiết','quantity'=>10,'status'=>2,'slide_id'=>1,'cate_id'=>2],
            ['name'=>'Túi sách tay nữ','slug'=>Str::slug('Túi sách tay nữ'),'image'=>'https://cf.shopee.vn/file/be4ea403dd93e565b4164880861a216f','description'=>'mô tả','price'=>100000,'sale'=>0,'detail'=>'nội dung chi tiết','quantity'=>10,'status'=>2,'slide_id'=>1,'cate_id'=>2],
            ['name'=>'Bộ công sở nữ','slug'=>Str::slug('Bộ công sở nữ'),'image'=>'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSS37hVo3thhDSMvSAPDajYlg1SUrBkgFu_OunVcR4s1GEy1b4s&usqp=CAU','description'=>'mô tả','price'=>100000,'sale'=>0,'detail'=>'nội dung chi tiết','quantity'=>10,'status'=>2,'slide_id'=>1,'cate_id'=>2],
            ['name'=>'Áo sơ mi','slug'=>Str::slug('Áo sơ mi'),'image'=>'https://cf.shopee.vn/file/04fdcee58d05dc61bebb2e8630738f8b','description'=>'mô tả','price'=>100000,'sale'=>0,'detail'=>'nội dung chi tiết','quantity'=>10,'status'=>2,'slide_id'=>1,'cate_id'=>2],
            ['name'=>'Váy chống nắng nữ','slug'=>Str::slug('Váy chống nắng nữ'),'image'=>'https://anh.eva.vn/upload/1-2017/images/2017-02-05/p--13--1486305962-width600height900.jpg','description'=>'mô tả','price'=>100000,'sale'=>0,'detail'=>'nội dung chi tiết','quantity'=>10,'status'=>2,'slide_id'=>1,'cate_id'=>2],
            ['name'=>'Áo dài tay nữ','slug'=>Str::slug('Áo dài tay nữ'),'image'=>'https://i.pinimg.com/236x/78/78/18/787818cfd8ef95548411278b785c260c.jpg','description'=>'mô tả','price'=>100000,'sale'=>0,'detail'=>'nội dung chi tiết','quantity'=>10,'status'=>2,'slide_id'=>1,'cate_id'=>2],
        ]);
    }
}
