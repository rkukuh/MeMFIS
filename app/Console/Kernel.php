<?php

namespace App\Console;

use Carbon\Carbon;
use App\Models\Employee;
use App\Models\InventoryOut;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            InventoryOut::where('created_at','<',Carbon::now()->subMinutes(10)->toDateTimeString())->doesnthave('approvals')->delete();
        })->everyMinute();

        $schedule->call(function(){
            $this->createAttendances();
        })->dailyAt('00:01');

        // $schedule->call(function () { //? Waiting Entity Created
        //     Motation::where('created_at','<',Carbon::now()->subMinutes(10)->toDateTimeString())->doesnthave('approvals')->delete();
        // })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }

    /**
     * Store a newly created employee attendances in storage.
     */
    public function createAttendances(){
        $employees = Employee::get(); //todo where active and approved, tapi fitur belom ada
        // create attendance with null;
        $in = '00:00:00';
        $out = '00:00:00';
        foreach($employees as $employee){
            $employee->employee_attendance()->create([
                'date' => Carbon::today(),
                'in' => $in,
                'out' => $out
            ]);
        }
    }
}
