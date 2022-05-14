<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCarehomeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('update', $this->carehome);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'    => [
                'string',
                'required',
            ],
            'current_stage_id'   => [
                'required',
                'exists:carehome_stages,id',
            ],
            'total_patients' => [
                'required',
            ],
            'week'   => [
                'required',
            ],
        ];
    }
}
