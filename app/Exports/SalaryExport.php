<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SalaryExport implements FromCollection, WithHeadings, WithColumnWidths
{

    public function __construct(private $from, private $to)
    {
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        DB::statement("SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));");

        $staffs = DB::table('user_infos')
            ->selectRaw('users.id,
            user_infos.name,
            positions.position_name,
            departments.department_name,
            month(attendances.created_at) as month,
            year(attendances.created_at) as year,
            (positions.base_salary / DAY(LAST_DAY(attendances.created_at) - 4) * COUNT(attendances.created_at)) as salary
            ')
            ->join('users', 'users.id', '=', 'user_infos.user_id')
            ->join('departments', 'user_infos.department_id', '=', 'departments.id')
            ->join('positions', 'positions.id', '=', 'user_infos.position_id')
            ->join('attendances', 'attendances.user_id', '=', 'user_infos.user_id')
            ->when($this->from, function ($q) {
                return $q->where('attendances.created_at', '>=', $this->from);
            })
            ->when($this->to, function ($q) {
                return $q->where('attendances.created_at', '<=', $this->to);
            })
            ->groupByRaw('user_infos.name, positions.position_name, departments.department_name')
            ->get();
        foreach ($staffs as $staff) {
            $times_late = DB::table('attendances')
                ->whereRaw('month(created_at) = ?', $staff->month)
                ->whereRaw('year(created_at) = ?', $staff->year)
                ->where('created_at', '>', '08:00:00')
                ->where('user_id', $staff->id)
                ->get()
                ->count();
            $staff->salary = number_format($staff->salary  - 50000 * $times_late, 0, '', ',');
        }

        return $staffs;
    }

    public function headings(): array
    {
        return ['Mã nhân viên', 'Họ tên', 'Chức vụ', 'Phòng ban', 'Tháng', 'Năm', 'Lương thực nhận (VNĐ)'];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 50,
            'C' => 50,
            'D' => 50,
            'E' => 10,
            'F' => 10,
            'G' => 20,
        ];
    }
}
