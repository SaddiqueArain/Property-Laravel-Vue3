<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;


class UserProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'profile_data.first_name' => 'required|string|min:3|max:50',
            'profile_data.last_name' => 'required|string|min:3|max:50',
            'profile_data.user_email' => 'required|email',
            'profile_data.phone_number' => 'required|min:11',
            'profile_data.password' => 'required|string|min:8',
        ];
    }

}
