<?php

namespace App\Http\Requests;

use App\Models\Job;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreJobRequest extends FormRequest
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
            'title'    => [ 'required', 'min:3', 'max:255' ],
            'salary'   => [ 'required', 'numeric', 'min_digits:3' ],
            'location' => [ 'required' ],
            'schedule' => [ 'required', Rule::in(Job::SCHEDULE) ],
            'url'      => [ 'required' ],
            'tags'     => [ 'nullable' ],
        ];
    }
}
