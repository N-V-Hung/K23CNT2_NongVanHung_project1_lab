<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Đảm bảo Hash được sử dụng

class NVH_KHACH_HANGTableSeeder extends Seeder
{
   /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('nvh_khach_hang')->insert([
            'nvhMaKhachHang'=>'KH001',
            'nvhHoTenKhachHang'=>'Nông Văn Hưng',
            'nvhEmail'=>'nvh@gmail.com',
            'nvhMatKhau'=>Hash::make('123456a@'), // Mã hóa mật khẩu
            'nvhDienThoai'=>'01255003',
            'nvhDiaChi'=>'Cao Bằng',
            'nvhNgayDangKy'=>'2024/12/12',
            'nvhTrangThai'=>0,
        ]);
        DB::table('nvh_khach_hang')->insert([
            'nvhMaKhachHang'=>'KH002',
            'nvhHoTenKhachHang'=>'Nguyễn Anh Tuấn',
            'nvhEmail'=>'Tuan@gmail.com',
            'nvhMatKhau'=>Hash::make('123456b#'), // Mã hóa mật khẩu
            'nvhDienThoai'=>'012554873',
            'nvhDiaChi'=>'Quảng Ninh',
            'nvhNgayDangKy'=>'2025/01/01',
            'nvhTrangThai'=>0,
        ]);
    }
}
