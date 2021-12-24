<?php

namespace app\models;

use app\core\Model;

class RegisterModel extends Model
{
    public string $Firstname;
    public string $Lastname;
    public string $Email;
    public string $Password;
    public string $PasswordConfirm;

    public function register()
    {
        echo "Creating new user";
    }

    public function rules(): array
    {
        return [
            'Firstname' => [self::RULE_REQUIRED],
            'Lastname' => [self::RULE_REQUIRED],
            'Email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'Password' => [self::RULE_REQUIRED, [self::RULE_MIN, 'Min' => 2], [self::RULE_MAX, 'Max' => 24]],
            'PasswordConfirm' => [self::RULE_REQUIRED, [self::RULE_MATCH, 'Match' => 'Password']],
        ];
    }

}