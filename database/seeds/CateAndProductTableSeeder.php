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
        DB::table('cates')->insert([
            ['id'=>1,'name'=>'Men Fashion','slug'=>Str::slug('men-fashion')],
            ['id'=>2,'name'=>'Women Fashion','slug'=>Str::slug('women-fashion')]
        ]);
        DB::table('products')->insert([
            ['Bộ thể thao',Str::slug('Bộ thể thao'),'https://cf.shopee.vn/file/e60adb2002b1f247840e45c9d8d0c2b6','mô tả',100000,0,'nội dung chi tiết',10,1,1],
            ['Áo đôi Neon',Str::slug('Áo đôi Neon'),'https://cdn.vatgia.vn/pictures/fullsize/2016/05/07/wvq1462627250.jpg','mô tả',100000,0,'nội dung chi tiết',10,1,1],
            ['Áo len nam cổ tròn',Str::slug('Áo len nam cổ tròn'),'http://aothudong.com/upload/product/atd-044/ao-len-nam-co-tron-han-quoc.jpg','mô tả',100000,0,'nội dung chi tiết',10,1,1],
            ['Áo phông Power',Str::slug('Áo phông Power'),'https://cdn2.yame.vn/pimg/ao-thun-nam-y2010-basic-am04-0019542/29e8f005-35cd-1400-8e52-0016a7815ec0.jpg?w=540&h=756&c=true&ntf=false','mô tả',100000,0,'nội dung chi tiết',10,1,1],
            ['Bộ combo hè nam',Str::slug('Bộ combo hè nam'),'https://tea-1.lozi.vn/v1/images/resized/ao-phong-the-thao-chat-lanh-cuc-mat-anh-that-1538814549-1-6241973-1538814549?w=480&type=s','mô tả',100000,0,'nội dung chi tiết',10,1,1],
            ['Áo phông face',Str::slug('Áo phông face'),'https://znews-photo.zadn.vn/w660/Uploaded/lce_mdlwc/2019_09_09/hhh.jpg','mô tả',100000,0,'nội dung chi tiết',10,1,1],
            ['Quần bò nữ',Str::slug('Quần bò nữ'),'https://i.pinimg.com/236x/88/88/79/8888798b0d06012aa29029065b041d1d.jpg','mô tả',100000,0,'nội dung chi tiết',10,1,1],
            ['Áo phông art',Str::slug('Áo phông art'),'https://cdn3.yame.vn/pimg/ao-thun-nam-y2010-basic-am03-0019541/acefa827-2339-1300-ccc6-0016a7814391.jpg?w=540&h=756&c=true&ntf=false','mô tả',100000,0,'nội dung chi tiết',10,1,1],
            ['Áo sơ mi nữ',Str::slug('Áo sơ mi nữ'),'https://www.remove.bg/assets/start_remove-79a4598a05a77ca999df1dcb434160994b6fde2c3e9101984fb1be0f16d0a74e.png','mô tả',100000,0,'nội dung chi tiết',10,1,2],
            ['Áo khoác bò',Str::slug('Áo khoác bò'),'https://ae01.alicdn.com/kf/H19dfd3f743934d88b6da78598d24e44d2.jpg_q50.jpg','mô tả',100000,0,'nội dung chi tiết',10,1,2],
            ['Áo phông X đen',Str::slug('Áo phông X đen'),'https://cf.shopee.vn/file/a214c674e958cc3e86bf1a024f160306','mô tả',100000,0,'nội dung chi tiết',10,1,2],
            ['Túi sách tay nữ',Str::slug('Túi sách tay nữ'),'https://cf.shopee.vn/file/be4ea403dd93e565b4164880861a216f','mô tả',100000,0,'nội dung chi tiết',10,1,2],
            ['Bộ công sở nữ',Str::slug('Bộ công sở nữ'),'https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSS37hVo3thhDSMvSAPDajYlg1SUrBkgFu_OunVcR4s1GEy1b4s&usqp=CAU','mô tả',100000,0,'nội dung chi tiết',10,1,2],
            ['Áo sơ mi',Str::slug('Áo sơ mi'),'https://cf.shopee.vn/file/04fdcee58d05dc61bebb2e8630738f8b','mô tả',100000,0,'nội dung chi tiết',10,1,2],
            ['Váy chống nắng nữ',Str::slug('Váy chống nắng nữ'),'https://anh.eva.vn/upload/1-2017/images/2017-02-05/p--13--1486305962-width600height900.jpg','mô tả',100000,0,'nội dung chi tiết',10,1,2],
            ['Áo dài tay nữ',Str::slug('Áo dài tay nữ'),'https://i.pinimg.com/236x/78/78/18/787818cfd8ef95548411278b785c260c.jpg','mô tả',100000,0,'nội dung chi tiết',10,1,2],
        ]);
    }
}
