<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class CheckpointRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'date' => [
                // Rule::unique('work_days')->where(function ($query) {
                //     return $query->where('date', $this->date)
                //         ->where('user_id', auth::user()->id)
                //         ->whereNull('deleted_at');
                // }),
            ],
            'time' => [
                Rule::unique('checkpoints')->where(function ($query) {
                    return $query->where('checked_at', $this->date + '' + $this->time)
                        ->where('user_id', auth::user()->id)
                        ->where('work_day_id', $this->work_day_id)
                        ->whereNull('deleted_at');
                }),
            ],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'date.unique' => 'Data já cadastrada.',
        ];
    }
}
