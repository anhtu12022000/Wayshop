<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            ['Những gam màu tươi sáng mở đầu trào lưu thời trang 2020','slug','Street style Sao Việt ngày càng lên hương vừa nữ tính, thanh lịch lại sang chảnh','https://media-giaoducthoidai.cdn.vccloud.vn/Uploaded/ngandk/2020-03-03/M2/ha-YBOM_thumb.jpg','nội dung'],
            ['Xu hướng thời trang công sở hot bất ngờ 2020: Thời trang nay không thể thiếu khẩu trang','slug','Ý tưởng của bộ sưu tập lần này được ra đời trong bối cảnh tất cả các ngành nghề đang phải đối diện với khó khăn do dịch corona.','https://cafebiz.cafebizcdn.vn/thumb_w/600/2020/2020-photo2020-03-0216-20-38-15831408523212027272910-0-0-375-600-crop-1583140858563-637187709512547579.jpg','body'],
            ['Những sàn diễn thời trang Xuân Hè 2020 khiến khán giả nhớ mãi','slug','Không đơn thuần là nơi ra mắt BST mới, sàn diễn thời trang Xuân Hè 2020 còn là &#8220;chất xúc tác&#8221; gắn kết ý tưởng sáng tạo của nhà thiết kế với xúc cảm rung động trong lòng người xem.','https://www.elle.vn/wp-content/uploads/2020/03/26/395022/san-dien-thuong-hieu-thuan-chay-Stella-McCartney.jpg','body'],
            ['Đón đầu xu hướng từ 10 BST thời trang Xuân Hè 2020 đặc sắc nhất','slug','Cùng ELLE bước vào không gian mùa Xuân và ngắm nhìn những thiết kế, BST đẹp nhất từ Tuần lễ thời trang Xuân &#8211; Hè 2020.','https://www.elle.vn/wp-content/uploads/2020/03/28/395424/bst-thoi-trang-Xuan-He-2020-Chanel.jpg','body'],
            ['test','slug','','body']
        ]);
    }
}
