<?php

namespace Modules\Ipaperwork\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ipaperwork\Entities\Company;
use Modules\Ipaperwork\Http\Requests\CreateCompanyRequest;
use Modules\Ipaperwork\Http\Requests\UpdateCompanyRequest;
use Modules\Ipaperwork\Repositories\CompanyRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

use Modules\Ipaperwork\Repositories\PaperworkRepository;

class CompanyController extends AdminBaseController
{
    /**
     * @var CompanyRepository
     */
    private $company;
    /**
     * @var PaperworkRepository
     */
    private $paperwork;

    public function __construct(
        CompanyRepository $company,
        PaperworkRepository $paperwork
    ){
        parent::__construct();

        $this->company = $company;
        $this->paperwork = $paperwork;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $companies = $this->company->all();
        return view('ipaperwork::admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $paperworks = $this->paperwork->all();
        return view('ipaperwork::admin.companies.create',compact('paperworks'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCompanyRequest $request
     * @return Response
     */
    public function store(CreateCompanyRequest $request)
    {

        \DB::beginTransaction();
        try {

            $this->company->create($request->all());
            \DB::commit();//Commit to Data Base

            return redirect()->route('admin.ipaperwork.company.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('ipaperwork::companies.title.companies')]));

        } catch (\Exception $e) {
            
            \DB::rollback();
            \Log::error($e);
            return redirect()->back()
                ->withError(trans('core::core.messages.resource error', ['name' => trans('ipaperwork::companies.title.companies')]))->withInput($request->all());

        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Company $company
     * @return Response
     */
    public function edit(Company $company)
    {
        $paperworks = $this->paperwork->all();
        return view('ipaperwork::admin.companies.edit', compact('company','paperworks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Company $company
     * @param  UpdateCompanyRequest $request
     * @return Response
     */
    public function update(Company $company, UpdateCompanyRequest $request)
    {

        \DB::beginTransaction();
        try {
            $this->company->update($company, $request->all());
            \DB::commit();//Commit to Data Base

            return redirect()->route('admin.ipaperwork.company.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('ipaperwork::companies.title.companies')]));

        } catch (\Exception $e) {
            \DB::rollback();
            \Log::error($e);
            return redirect()->back()
                ->withError(trans('core::core.messages.resource error', ['name' => trans('ipaperwork::companies.title.companies')]))->withInput($request->all());

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Company $company
     * @return Response
     */
    public function destroy(Company $company)
    {

        try {
            
            $this->company->destroy($company);

            return redirect()->route('admin.ipaperwork.company.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('ipaperwork::companies.title.companies')]));
        
        } catch (\Exception $e) {
            \Log::error($e);
            return redirect()->back()
                ->withError(trans('core::core.messages.resource error', ['name' => trans('ipaperwork::companies.title.companies')]));

        }

    }
}
