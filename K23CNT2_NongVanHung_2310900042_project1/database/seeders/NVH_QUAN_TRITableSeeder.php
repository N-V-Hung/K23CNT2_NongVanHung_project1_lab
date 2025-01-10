<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Thêm dòng này

class NVH_QUAN_TRITableSeeder extends Seeder
{
    public function run(): void
    {
         // Kiểm tra xem email đã tồn tại hay chưa
    $exists = DB::table('NVH_QUANTRI')->where('nvhTaiKhoan', 'nvh@gmail.com')->exists();
    if (!$exists) {
        DB::table('NVH_QUANTRI')->insert([
            'nvhTaiKhoan' => 'nvh@gmail.com',
            'nvhMatKhau' => Hash::make('123'), // Đảm bảo mật khẩu được mã hóa
            'nvhTrangThai' => 0,
        ]);
        DB::table('NVH_QUANTRI')->insert([
            'nvhTaiKhoan'=>"1584889",
            'nvhMatKhau'=>Hash::make('123'), // Đảm bảo mật khẩu được mã hóa
            'nvhTrangThai'=>0
        ]);
                 }
    }
}
