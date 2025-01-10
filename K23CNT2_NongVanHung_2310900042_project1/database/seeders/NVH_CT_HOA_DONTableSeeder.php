<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NVH_CT_HOA_DONTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // //
        DB::table('NVH_CT_HOA_DON')->insert([
            'nvhHoaDonID'=>1,
            'nvhSanPhamID'=>1,
            'nvhSoLuongMua'=>1,
            'nvhDonGiaMua'=>699000,
            'nvhThanhTien'=>699000 * 1,
            'nvhTrangThai'=>0,
        ]);

        DB::table('NVH_CT_HOA_DON')->insert([
            'nvhHoaDonID'=>2,
            'nvhSanPhamID'=>2,
            'nvhSoLuongMua'=>2,
            'nvhDonGiaMua'=>550000,
            'nvhThanhTien'=>550000 * 2,
            'nvhTrangThai'=>0,
        ]);
    }
}
