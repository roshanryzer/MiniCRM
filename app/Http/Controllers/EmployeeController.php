<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Model\Employee;
use App\Model\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;

class EmployeeController extends Controller
{

    public function __invoke()
    {
//        $companies=Company::all();
        return view('employees.index');
    }

}
