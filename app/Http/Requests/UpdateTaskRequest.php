<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateTaskRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|mix:255'
        ];
    }

    public function messages(){
        return [
            'title.required' => '任务名称不得为空！',
            'title.mix' => '任务名称过长',
        ];
    }
}
