<?php

use App\Models\Workshift;
use App\Models\WorkshiftSchedule;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
class WorkshiftsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $workshift = Workshift::create([
            'code' => 'RGLR-001',
            'name' => 'REGULAR SHIFT',
            'description' => 'monday to friday',
        ]);

        $days = [];

        $day = [
            'day' => 'monday',
            'in' => Carbon::createFromTimeString('06:30:00', 'Asia/Jakarta'),
            'break_in' => Carbon::createFromTimeString('12:00:00', 'Asia/Jakarta'),
            'break_out' => Carbon::createFromTimeString('13:00:00', 'Asia/Jakarta'),
            'out' => Carbon::createFromTimeString('16:30:00', 'Asia/Jakarta')
        ];
        array_push($days,$day);

        $day = [
            'day' => 'tuesday',
            'in' => Carbon::createFromTimeString('06:30:00', 'Asia/Jakarta'),
            'break_in' => Carbon::createFromTimeString('12:00:00', 'Asia/Jakarta'),
            'break_out' => Carbon::createFromTimeString('13:00:00', 'Asia/Jakarta'),
            'out' => Carbon::createFromTimeString('16:30:00', 'Asia/Jakarta')
        ];
        array_push($days,$day);

        $day = [
            'day' => 'wednesday',
            'in' => Carbon::createFromTimeString('06:30:00', 'Asia/Jakarta'),
            'break_in' => Carbon::createFromTimeString('12:00:00', 'Asia/Jakarta'),
            'break_out' => Carbon::createFromTimeString('13:00:00', 'Asia/Jakarta'),
            'out' => Carbon::createFromTimeString('16:30:00', 'Asia/Jakarta')
        ];
        array_push($days,$day);

        $day = [
            'day' => 'thurday',
            'in' => Carbon::createFromTimeString('06:30:00', 'Asia/Jakarta'),
            'break_in' => Carbon::createFromTimeString('12:00:00', 'Asia/Jakarta'),
            'break_out' => Carbon::createFromTimeString('13:00:00', 'Asia/Jakarta'),
            'out' => Carbon::createFromTimeString('16:30:00', 'Asia/Jakarta')
        ];
        array_push($days,$day);

        $day = [
            'day' => 'friday',
            'in' => Carbon::createFromTimeString('06:30:00', 'Asia/Jakarta'),
            'break_in' => Carbon::createFromTimeString('12:00:00', 'Asia/Jakarta'),
            'break_out' => Carbon::createFromTimeString('13:00:00', 'Asia/Jakarta'),
            'out' => Carbon::createFromTimeString('16:30:00', 'Asia/Jakarta')
        ];
        array_push($days,$day);

        foreach($days as $day){
            WorkshiftSchedule::create([
                'in' => $day['in'],
                'out' => $day['out'],
                'days' => $day['day'],
                'break_in' => $day['break_in'],
                'break_out' => $day['break_out'],
                'workshift_id' => $workshift->id,
            ]);
        }
    }
}
