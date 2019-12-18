<?php

use App\Models\Type;
use App\Models\LeaveType;
use Illuminate\Database\Seeder;

class LeaveTypeExamples extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** dummy Leave type examples for trial */

        LeaveType::create([
            'code' => strtolower('IPC'),
            'name' => 'Ijin Pulang Cepat',
            'gender_id' => Type::ofGender()->where('code', strtolower('All'))->first()->id,
            'type_id' => Type::ofLeaveType()->where('code', 'daily')->first()->id,
            'leave_period' => 36,
            'prorate_leave' => false,
            'distribute_evently' => false,
            'back_date' => false
        ]);

        LeaveType::create([
            'code' => strtolower('Sakit'),
            'name' => 'Ijin Sakit',
            'gender_id' => Type::ofGender()->where('code', strtolower('All'))->first()->id,
            'type_id' => Type::ofLeaveType()->where('code', 'multi-day')->first()->id,
            'leave_period' => 1000,
            'prorate_leave' => false,
            'distribute_evently' => false,
            'back_date' => true
        ]);

        LeaveType::create([
            'code' => strtolower('Haid'),
            'name' => 'Cuti Haid',
            'gender_id' => Type::ofGender()->where('code', strtolower('FEMALE'))->first()->id,
            'type_id' => Type::ofLeaveType()->where('code', 'multi-day')->first()->id,
            'leave_period' => 24,
            'prorate_leave' => true,
            'distribute_evently' => true,
            'back_date' => true
        ]);

        LeaveType::create([
            'code' => strtolower('Cutith'),
            'name' => 'Cuti Tahunan',
            'gender_id' => Type::ofGender()->where('code', strtolower('ALL'))->first()->id,
            'type_id' => Type::ofLeaveType()->where('code', 'multi-day')->first()->id,
            'leave_period' => 12,
            'prorate_leave' => false,
            'distribute_evently' => false,
            'back_date' => false
        ]);

        LeaveType::create([
            'code' => strtolower('Late'),
            'name' => 'Ijin Datang Terlambat',
            'gender_id' => Type::ofGender()->where('code', strtolower('ALL'))->first()->id,
            'type_id' => Type::ofLeaveType()->where('code', 'daily')->first()->id,
            'leave_period' => 36,
            'prorate_leave' => false,
            'distribute_evently' => true,
            'back_date' => false
        ]);
        
    }
}
