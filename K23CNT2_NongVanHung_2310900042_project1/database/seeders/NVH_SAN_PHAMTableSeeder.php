<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class nvh_san_phamTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table("nvh_san_pham")->insert([
            'nvhMaSanPham' => "VP001",
            'nvhTenSanPham'=> "Cay phu quy",
            'nvhHinhAnh'=>"images/san-pham/VP001",            
            'nvhSoLuong'=>100,            
            'nvhDonGia'=>699000,            
            'nvhMaLoai'=>1,            
            'nvhTrangThai'=>0,            
        ]);
        DB::table('nvh_san_pham')->insert([
            'nvhMaSanPham' => "VP002",
            'nvhTenSanPham'=> "Cay dai phu gia",
            'nvhHinhAnh'=>"images/san-pham/VP002",            
            'nvhSoLuong'=>200,            
            'nvhDonGia'=>550000,            
            'nvhMaLoai'=>1,            
            'nvhTrangThai'=>0,            
        ]);
        DB::table('nvh_san_pham')->insert([
            'nvhMaSanPham' => "VP003",
            'nvhTenSanPham'=> "Cay hanh phuc",
            'nvhHinhAnh'=>"images/san-pham/VP003",            
            'nvhSoLuong'=>150,            
            'nvhDonGia'=>250000,            
            'nvhMaLoai'=>1,            
            'nvhTrangThai'=>0,            
        ]);
    }
}
