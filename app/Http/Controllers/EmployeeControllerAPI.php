<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Http\Resources\EmployeeResource;
use App\Model\Company;
use App\Model\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class EmployeeControllerAPI extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*   public function index()
       {
           return EmployeeResource::collection(Employee::with('company')->paginate(10));

       }*/

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create([
            'first_name' => Str::title($request->employee_first_name),
            'last_name' => Str::title($request->employee_last_name),
            'email' => $request->employee_email,
            'company_id' => $request->employee_company,
            'phone' => $request->employee_phone,
        ]);
        if ($employee) {
            return response()->json(['success' => 'Employee "' . $employee->first_name . ' ' . $employee->last_name . ' " Added'], 200);
        }
        return response()->json(['error' => 'Employee cannot be created, Please try again later'], 500);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::with('company')->find($id);
        if (isset($employee)) {
            return response()->json($employee, 200);
        }
        return response()->json(['error' => 'Employee cannot be found, Please try again later'], 500);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeUpdateRequest $request, $id)
    {
        $employee = Employee::find($id);
        if (isset($employee)) {
            $employee->update([
                'first_name' => Str::title($request->employee_update_first_name),
                'last_name' => Str::title($request->employee_update_last_name),
                'email' => $request->employee_update_email,
                'company_id' => $request->employee_update_company,
                'phone' => $request->employee_update_phone,
            ]);
            return response()->json(['success' => ' Employee "' . $employee->first_name . ' ' . $employee->last_name . '" Updated'], 200);
        }
        return response()->json(['error' => 'Employee cannot be created, Please try again later'], 500);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);
        if (isset($employee)) {
            $employee->delete();
            return response()->json(['success' => 'Employee Deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'Employee Not found'], 500);
        }
    }

    public function searchCompanies(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('company');
            $data = Company::select(['id', 'name'])
                ->where('name', 'like', '%' . $query . '%')
                ->orderBy('name')->paginate(8);
            return response()->json([
                'items' => $data->toArray()['data'],
                'pagination' => $data->nextPageUrl() ? true : false
            ]);

        } else {
            abort(404);
        }
    }


    public function employeesJson()
    {
        $employee = Employee::with('company');
        return DataTables::of($employee)
            ->addColumn('action', function ($employee) {
                return '<a href = "#" class="btn btn-sm btn-clean btn-icon btn-icon-md btn-edit-employee" title = "Edit" class="tip edit-language-button" data-id = "' . $employee->id . '"
               data-original-title = "edit">
                <i class="la la-edit"></i> </a>
                <a class="btn btn-sm btn-clean btn-icon btn-icon-md deleteDialog btn-delete-employee tip" data-toggle = "modal" data-id = "' . $employee->id . '" role = "button" data-original-title = "Delete"
               data-original-title = "Delete">
                <i class="la la-trash-o"></i>
                </a> ';
            })
            ->rawColumns(['action'])
            ->make();
    }
}
