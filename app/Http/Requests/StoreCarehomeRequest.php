<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarehomeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('create', Carehome::class);
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
            'current_stage_id.*' =>[
                'required',
                'array',
            ],
            'current_stage_id'   => [
                'exists:carehome_stages,id',
            ],
            'total_patients' => [
                'required|integer',
            ],
            'week.*'   => [
                'required',
                'array',
            ],
            // 'week'   => [
            //     'integer',
            // ],
        ];
    }
}
