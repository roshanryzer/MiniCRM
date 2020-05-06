<?php

namespace App\Http\Controllers;

use App\Model\Company;
use App\Model\Employee;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $companies = Company::with('employees')->orderBy('name')->get();
/*        $employees = Employee::with(['company' => function ($company) {
            $company->orderBy('companies.name');
        }])->paginate(10);*/
        return view('dashboard.index', compact('companies'));
    }

    public function sort(Request $request)
    {
        $employee = Employee::find($request->employee_id);
        if(isset($employee)){
            $employee->update([
                'company_id' =>$request->company_id
            ]);
            return response()->json(['success' => 'Sorted  successfully'], 200);
        }
        return response()->json(['error' => 'Something error occurred'], 500);
    }


    public function employees(Request $request)
    {
        $companies = Company::with('employees')->orderBy('name')->get();
        return view('dashboard.employee-card', compact('companies'));
    }

    public function companies(Request $request)
    {
        $companies = Company::with('employees')->orderBy('name')->get();
        return view('dashboard.company-card', compact('companies'));
    }



}
