<?php

namespace App\Helpers;

use App\Models\Attendance;

class Helper
{
    public static function get_late_day_by_id($id, $from = null, $to = null)
    {
        return Attendance::where('user_id', $id)
            ->whereRaw('cast(attendances.check_in as time) >= ?', '08:00:00')
            ->when($from, function ($q) use ($from) {
                return $q->where('attendances.created_at', '>=', $from . ' 00:00:00');
            })->when($to, function ($q) use ($to) {
                return $q->where('attendances.created_at', '<=', $to . ' 23:59:59');
            })->get()->count();
    }
}
