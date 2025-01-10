<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class NVH_TIN_TUC extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insert 10 rows of fake data into the 'NVH_TIN_TUC' table
        for ($i = 0; $i < 10; $i++) {
            DB::table('NVH_TIN_TUC')->insert([
                'nvhMaTT' => $faker->unique()->word, // Unique identifier for the news article
                'nvhTieuDe' => $faker->sentence, // Title of the news article
                'nvhMoTa' => $faker->text(200), // Description (shorter text)
                'nvhNoiDung' => $faker->paragraph(5), // Content (longer text)
                'nvhNgayDangTin' => $faker->dateTimeThisYear(), // Random date/time within the current year
                'nvhNgayCapNhap' => $faker->dateTimeThisYear(), // Random date/time within the current year
                'nvhHinhAnh' => $faker->imageUrl(), // Random image URL
                'nvhTrangThai' => $faker->numberBetween(0, 1), // Status (0 or 1, assuming binary status)
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
