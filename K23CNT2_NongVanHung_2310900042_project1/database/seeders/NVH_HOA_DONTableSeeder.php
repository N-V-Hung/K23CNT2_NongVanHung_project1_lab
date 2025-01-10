<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NVH_HOA_DONTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('nvh_hoa_don')->insert([
            'nvhMaHoaDon'=>'HD001',
            'nvhMaKhachHang'=>1,
            'nvhNgayHoaDon'=>'2024/12/12',
            'nvhNgayNhan'=>'2024/12/12',
            'nvhHoTenKhachHang'=>'Nông Văn Hưng',
            'nvhEmail'=>'nvh@gmail.com',
            'nvhDienThoai'=>'01255003',
            'nvhDiaChi'=>'Cao Bằng',
            'nvhTongGiaTri'=>'790000',
            'nvhTrangThai'=>2,
        ]);

        DB::table('nvh_hoa_don')->insert([
            'nvhMaHoaDon'=>'HD002',
            'nvhMaKhachHang'=>2,
            'nvhNgayHoaDon'=>'2025-01-03',
            'nvhNgayNhan'=>'2024/01/04',
            'nvhHoTenKhachHang'=>'Nguyễn Anh Tuấn',
            'nvhEmail'=>'tuan@gmail.com',
            'nvhDienThoai'=>'056894848',
            'nvhDiaChi'=>'Quảng Ninh',
            'nvhTongGiaTri'=>'125000',
            'nvhTrangThai'=>0,
        ]);
    }
}
