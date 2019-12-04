<?php

use Carbon\Carbon;
use App\Models\Holiday;
use Illuminate\Database\Seeder;

class HolidaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $year = 2019; $month = 8; $day = 17; $tz = 'Asia/Jakarta';

        for($i = 75; $i <= 100; $i++){

            $day = 17; $month = 8;
            $createMidnightDate = Carbon::createMidnightDate($year, $month, $day, $tz);
            Holiday::create([
                'code' => 'kemederkaan-'.$i,
                'name' => 'HUT RI Ke-'.$i,
                'start_date' => $createMidnightDate,
                'end_date' => $createMidnightDate,
                'description' => 'Hari Kemerdekaan Indonesia yang ke-'.$i
            ]);

            $day = 10;  $month = 10;
            $createMidnightDate = Carbon::createMidnightDate($year, $month, $day, $tz);
            Holiday::create([
                'code' => 'hari-pahlawan',
                'name' => 'Hari Pahlawan',
                'start_date' => $createMidnightDate,
                'end_date' => $createMidnightDate,
                'description' => 'Hari Pahlawan'
            ]);

            $day = 1;  $month = 6;
            $createMidnightDate = Carbon::createMidnightDate($year, $month, $day, $tz);
            Holiday::create([
                'code' => 'hari-pancasila',
                'name' => 'Hari Pancasila',
                'start_date' => $createMidnightDate,
                'end_date' => $createMidnightDate,
                'description' => 'Hari Pancasila'
            ]);

            $day = 24;  $month = 12;
            $createMidnightDate = Carbon::createMidnightDate($year, $month, $day, $tz);
            Holiday::create([
                'code' => 'hari-cuti-natal',
                'name' => 'Hari Cuti Natal',
                'start_date' => $createMidnightDate,
                'end_date' => $createMidnightDate,
                'description' => 'Hari Cuti Natal'
            ]);

            $day = 25;  $month = 12;
            $createMidnightDate = Carbon::createMidnightDate($year, $month, $day, $tz);
            Holiday::create([
                'code' => 'hari-natal',
                'name' => 'Hari Natal',
                'start_date' => $createMidnightDate,
                'end_date' => $createMidnightDate,
                'description' => 'Hari Natal'
            ]);

            $day = 1;  $month = 1;
            $createMidnightDate = Carbon::createMidnightDate($year, $month, $day, $tz);
            Holiday::create([
                'code' => 'tahun-baru-masehi',
                'name' => 'Tahun Baru Masehi',
                'start_date' => $createMidnightDate,
                'end_date' => $createMidnightDate,
                'description' => 'Tahun Baru Masehi'
            ]);

            $day = 1;  $month = 5;
            $createMidnightDate = Carbon::createMidnightDate($year, $month, $day, $tz);
            Holiday::create([
                'code' => 'hari-buruh',
                'name' => 'Hari Buruh',
                'start_date' => $createMidnightDate,
                'end_date' => $createMidnightDate,
                'description' => 'Hari Buruh'
            ]);

            $day = 1;  $month = 12;
            $createMidnightDate = Carbon::createMidnightDate($year, $month, $day, $tz);
            Holiday::create([
                'code' => 'dec-01',
                'name' => 'Libur MMF',
                'start_date' => $createMidnightDate,
                'end_date' => $createMidnightDate,
                'description' => 'Libur MMF'
            ]);

            $year++;
        }
    }
}
