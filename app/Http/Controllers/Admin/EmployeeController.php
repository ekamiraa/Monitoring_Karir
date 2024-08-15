<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\EmployeesImport;
use Maatwebsite\Excel\Facades\Excel;


class EmployeeController extends Controller
{
    public function index()
    {
        return view('admin.employee.index');
    }

    public function import()
    {
        return view('admin.employee.import');
    }

    public function importExcelData(Request $request)
    {
        $request->validate([
            'import-file' => [
                'required',
                'file'
            ],
        ]);

        Excel::import(new EmployeesImport, $request->file('import-file'));

        return redirect()->back()->with('status', 'Imported Successfully');
    }
}
