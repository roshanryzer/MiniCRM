<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompanyRequest;
use App\Model\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;

class CompanyController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('companies.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.add');
    }


    public function store(CompanyRequest $request)
    {
        $company = Company::create([
            'name' => Str::title($request->company_name),
            'email' => $request->company_email,
            'website' => $request->company_website,
        ]);

        if ($request->hasFile('company_logo')) {
            $path = "storage/companies/thumbnails/";
            if (!File::exists($path)) {
                File::makeDirectory($path, $mode = 0777, true, true);
            }
            $uploaded_logo = $request->file('company_logo');
            $logo_name = 'company' . '-' . $company->id . '-' . time() . '.' . $uploaded_logo->getClientOriginalExtension();
            $thumbPath = public_path($path);
            $img = Image::make($uploaded_logo->getRealPath());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbPath . '/' . $logo_name);
            $destinationPath = public_path('storage/companies/');
            $uploaded_logo->move($destinationPath, $logo_name);
            $company->update([
                'logo' => $logo_name
            ]);
        }
        return response()->json(['success' => 'Company "' . $company->name . ' " Added'], 200);

    }



    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request)
    {
        $company = Company::find($request->id);
        if (isset($company)) {
            $company->update([
                'name' => Str::title($request->company_name),
                'email' => $request->company_email,
                'website' => $request->company_website,
            ]);
            if ($request->hasFile('company_logo')) {
                $path = "storage/companies/thumbnails/";
                if (!File::exists($path)) {
                    File::makeDirectory($path, $mode = 0777, true, true);
                }

                if (!empty($company->logo)) {
                    if (is_file(public_path('storage/companies/thumbnails/' . $company->logo))) {
                        unlink(public_path('storage/companies/thumbnails/' . $company->logo));
                    }
                    if (is_file(public_path('storage/companies/' . $company->logo))) {
                        unlink(public_path('storage/companies/' . $company->logo));
                    }
                }
                $uploaded_logo = $request->file('company_logo');
                $logo_name = 'company' . '-' . $company->id . '-' . time() . '.' . $uploaded_logo->getClientOriginalExtension();
                $thumbPath = public_path($path);
                $img = Image::make($uploaded_logo->getRealPath());
                $img->resize(100, 100, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($thumbPath . '/' . $logo_name);
                $destinationPath = public_path('storage/companies/');
                $uploaded_logo->move($destinationPath, $logo_name);
                $company->update([
                    'logo' => $logo_name
                ]);
            }
            return response()->json(['success' => ' Company "' . $company->name . ' " Updated'], 200);
        } else {
            return response()->json(['error' => 'Invalid Request'], 500);
        }
    }


    public function destroy($id)
    {

        $company = Company::find($id);
        if (isset($company)) {
            if($company->employees()->exists()){
                $company->employees()->delete();

            }else{
                $company->delete();
            }

            return response()->json(['success' => 'Company Deleted successfully'], 200);
        } else {
            return response()->json(['error' => 'Company Not found'], 500);
        }
    }


    public function companiesJson()
    {
        $company = Company::select('id','name', 'email', 'logo', 'website');
        return DataTables::of($company)
            ->addColumn('logo', function ($company) {
                return findLogo($company->logo, $company->name);
            })
            ->addColumn('action', function ($company) {
                return '<a href = "#" class="btn btn-sm btn-clean btn-icon btn-icon-md btn-edit-company" title = "Edit" class="tip edit-language-button" data-id = "' . $company->id . '"
               data-original-title = "edit">
                <i class="la la-edit"></i> </a>
                <a class="btn btn-sm btn-clean btn-icon btn-icon-md deleteDialog btn-delete-company tip" data-toggle = "modal" data-id = "' . $company->id . '" role = "button" data-original-title = "Delete"
               data-original-title = "Delete">
                <i class="la la-trash-o"></i>
                </a> ';
            })
            ->rawColumns(['logo', 'action'])
            ->make();
    }
}
