<?php

namespace Modules\Ipaperwork\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateUserPaperworkHistoryRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'user_paperwork_id' => 'required',
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
            'user_paperwork_id.required' => trans('ipaperwork::common.messages.userpaperworkid is required'),
        ];
    }

    public function translationMessages()
    {
        return [
            'user_paperwork_id.required' => trans('ipaperwork::common.messages.userpaperworkid is required'),
        ];
    }
}
