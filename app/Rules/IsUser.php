<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IsUser implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $users = session('users') ? session('users') : config('users.users');

        $filteredUsers = array_filter($users, function ($user) use ($value) {
            return $user['email'] == $value;
        });

        if ($filteredUsers) {
            $fail('Користувач з цим email вже існує!');
        }
    }
}
