<?php

namespace App\Exports;

use App\Models\UserInfo;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeeExport implements FromCollection, WithHeadings,WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('user_infos')
        ->selectRaw('user_infos.name, CAST(user_infos.date_of_birth as DATE) as date_of_birth, 
        user_infos.address, user_infos.phone_number, positions.position_name, departments.department_name')
        ->join('departments', 'departments.id', '=', 'user_infos.department_id')
        ->join('positions', 'positions.id', '=', 'user_infos.position_id')
        ->get();;
    }

    public function headings(): array
    {
        return ['Họ tên', 'Ngày sinh', 'Địa chỉ', 'Số điện thoại', 'Chức vụ', 'Phòng ban'];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 20,
            'C' => 20,
            'D' => 20,
            'E' => 20,
            'F' => 30,
            'G' => 30,
        ];
    }
}
