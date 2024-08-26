<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        if ($request->user()->hasRole('admin')) {
            $position = Employee::select('posisi', DB::raw('count(*) as total'))
                ->groupBy('posisi')
                ->get();

            $age = Employee::select(
                DB::raw('FLOOR(DATEDIFF(CURDATE(), tgl_lahir) / 365) as umur'),
                DB::raw('count(*) as total')
            )
                ->groupBy('umur')
                ->get();

            $area = Employee::select('area_nama', DB::raw('count(*) as total'))
                ->groupBy('area_nama')
                ->get();

            $regional = Employee::select('regional_nama', DB::raw('count(*) as total'))
                ->groupBy('regional_nama')
                ->get();

            $gender = Employee::select('jk', DB::raw('count(*) as total'))
                ->groupBy('jk')
                ->get();

            $experience = Employee::select('pengalaman', DB::raw('count(*) as total'))
                ->groupBy('pengalaman')
                ->get();

            return view('admin.dashboard', compact('position', 'age', 'area', 'regional', 'gender', 'experience'));
        }

        abort(403, 'You do not have the right roles.');
    }
}
