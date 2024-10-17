<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexVegetableRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Since this API is open to any user, we can allow any request
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
            // As this is an index request, there are no input parameters thus no validation rules to check
        ];
    }
}
