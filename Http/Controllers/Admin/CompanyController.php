<?php

namespace Modules\Ipaperwork\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Ipaperwork\Entities\Company;
use Modules\Ipaperwork\Http\Requests\CreateCompanyRequest;
use Modules\Ipaperwork\Http\Requests\UpdateCompanyRequest;
use Modules\Ipaperwork\Repositories\CompanyRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class CompanyController extends AdminBaseController
{
    /**
     * @var CompanyRepository
     */
    private $company;

    public function __construct(CompanyRepository $company)
    {
        parent::__construct();

        $this->company = $company;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$companies = $this->company->all();

        return view('ipaperwork::admin.companies.index', compact(''));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('ipaperwork::admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateCompanyRequest $request
     * @return Response
     */
    public function store(CreateCompanyRequest $request)
    {
        $this->company->create($request->all());

        return redirect()->route('admin.ipaperwork.company.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('ipaperwork::companies.title.companies')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Company $company
     * @return Response
     */
    public function edit(Company $company)
    {
        return view('ipaperwork::admin.companies.edit', compact('company'));
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
        $this->company->update($company, $request->all());

        return redirect()->route('admin.ipaperwork.company.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('ipaperwork::companies.title.companies')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Company $company
     * @return Response
     */
    public function destroy(Company $company)
    {
        $this->company->destroy($company);

        return redirect()->route('admin.ipaperwork.company.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('ipaperwork::companies.title.companies')]));
    }
}
