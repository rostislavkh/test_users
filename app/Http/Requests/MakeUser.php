<?php

namespace App\Http\Requests;

use App\Rules\IsUser;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;

class MakeUser extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'email' => ['required', 'email', new IsUser()],
            'password' => 'required|min:8|confirmed',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
//        dd($validator->messages()->messages());
        $messages = $validator->messages()->messages();

        user_logs(false, $messages[array_key_first($messages)][0]);

        parent::failedValidation($validator);
    }
}
