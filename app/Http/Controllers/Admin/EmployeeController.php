<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Imports\EmployeesImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Employee;


class EmployeeController extends Controller
{
    public function index()
    {
        $data = Employee::all();
        return view('admin.employee.index', compact('data'));
    }

    public function import()
    {
        return view('admin.employee.import');
    }

    public function importExcelData(Request $request)
    {
        $data = $request->file('import-file');

        $namafile = $data->getClientOriginalName();
        $data->move('EmployeeData', $namafile);

        Excel::import(new EmployeesImport, \public_path('EmployeeData/' . $namafile));

        return redirect('admin/employee')->with('status', 'Imported Successfully');
    }
}
