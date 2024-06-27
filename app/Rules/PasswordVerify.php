<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class PasswordVerify implements ValidationRule {
    protected $password1;
    protected $password2;

    public function __construct($password1, $password2) {
        $this->password1 = $password1;
        $this->password2 = $password2;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void {
        $passwordMatches = password_verify($this->password1, $this->password2);
        if (!$passwordMatches) {
            $fail('password salah.');
        }
    }
}