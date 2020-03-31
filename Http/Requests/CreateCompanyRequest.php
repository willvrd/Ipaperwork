<?php

namespace Modules\Ipaperwork\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateCompanyRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'title' => 'required|min:2'
        ];
    }

    public function translationRules()
    {
        return [];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'title.required' => trans('iblog::common.messages.title is required'),
            'title.min:2'=> trans('iblog::common.messages.title min 2 '),
        ];
    }

    public function translationMessages()
    {
        return [];
    }
}
