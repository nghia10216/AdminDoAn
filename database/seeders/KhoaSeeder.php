<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class KhoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gioithieuCNTT = "Lịch sử hình thành và phát triển

    - Năm 1979, Bộ môn Kỹ thuật tính toán, trực thuộc Ban Giám Hiệu Trường Đại học Bách khoa Đà Nẵng được thành lập, với ba cán bộ giảng dạy đầu tiên.
    
    - Năm 1986, Trường Đại học Bách khoa Đà Nẵng nhận được máy tính điện tử МИНСК-22, thuộc thế hệ 2, chế tạo tại Liên-Xô.
    
    - Năm 1991, thành lập Trung tâm Tin Học dựa trên cơ sở Bộ môn Kỹ thuật tính toán, Trường Đại học Bách khoa.
    
    - Năm 1996, Bộ Giáo dục & Đạo tạo ra Quyết định số 4430/GD-ĐT ngày 17/10/1996 cho phép thành lập Khoa Công nghệ Thông tin (CNTT), trực thuộc Trường Đại học Kỹ thuật, Đại học Đà Nẵng. Trong suốt bốn năm từ 1996 đến 2000, Khoa CNTT là một trong bảy Khoa CNTT trọng điểm của Nhà nước trong chương trình Quốc gia về phát triển và ứng dụng CNTT ở Việt nam (theo Nghị quyết 49/CP ký ngày 03/08/1993 của Chính phủ).
    
    - Năm 1999, Khoa CNTT đào tạo khóa Cao học Khoa học Máy tính đầu tiên.
    
    - Năm 2001, Khoa CNTT đổi tên thành Khoa Công nghệ Thông tin & Điện tử Viễn thông.
    
    - Năm 2004, nhằm đáp ứng nhu cầu xã hội và sự lớn mạnh của ngành Công nghệ Thông tin, Khoa Công nghệ Thông tin & Điện tử Viễn thông được tách thành Khoa Công nghệ Thông tin và Khoa Điện tử Viễn thông.";
        DB::table('khoa')->insert([
            ['TenKhoa' => 'Công nghệ thông tin','LogoKhoa'=> 'https://firebasestorage.googleapis.com/v0/b/fir-storage-nghia.appspot.com/o/image1603048909181.png?alt=media&token=e1dfb297-b348-4288-a2c4-b0bcc7c655d8', 'SDT'=>'0985243472', 'Email'=>'condusudu@gmail.com','GioiThieuKhoa' => $gioithieuCNTT],
            ['TenKhoa' => 'Nhiệt','LogoKhoa'=> 'https://firebasestorage.googleapis.com/v0/b/fir-storage-nghia.appspot.com/o/image1603045990344.png?alt=media&token=f30bf0a3-540d-439a-9ece-d94778e2807e', 'SDT'=>'0985243472', 'Email'=>'condusudu1@gmail.com','GioiThieuKhoa' => $gioithieuCNTT],
            ['TenKhoa' => 'Cơ khí','LogoKhoa'=> 'https://firebasestorage.googleapis.com/v0/b/fir-storage-nghia.appspot.com/o/image1603048909181.png?alt=media&token=e1dfb297-b348-4288-a2c4-b0bcc7c655d8', 'SDT'=>'015487584', 'Email'=>'condusudu2@gmail.com','GioiThieuKhoa' => $gioithieuCNTT],
            ['TenKhoa' => 'Hóa','LogoKhoa'=> 'https://firebasestorage.googleapis.com/v0/b/fir-storage-nghia.appspot.com/o/image1603048909181.png?alt=media&token=e1dfb297-b348-4288-a2c4-b0bcc7c655d8', 'SDT'=>'102145845', 'Email'=>'condusudu3@gmail.com','GioiThieuKhoa' => $gioithieuCNTT],
            ['TenKhoa' => 'Môi Trường','LogoKhoa'=> 'https://firebasestorage.googleapis.com/v0/b/fir-storage-nghia.appspot.com/o/image1603048909181.png?alt=media&token=e1dfb297-b348-4288-a2c4-b0bcc7c655d8', 'SDT'=>'0985243472', 'Email'=>'condusudu4@gmail.com','GioiThieuKhoa' => $gioithieuCNTT]
    	]);

    }
}
