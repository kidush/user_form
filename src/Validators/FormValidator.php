<?php

namespace Validators;

class FormValidator
{
    private \Users\Models\User $user;
    private array $errors;

    public function __construct(\Users\Models\User $user)
    {
        $this->user = $user;
        $this->errors = array();
    }

    public function validate()
    {
        if (!$this->validateFields())
            return false;
        return true;
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    private function validateFieldPresence($field): bool
    {
        if (empty($field) || is_null($field))
            return false;

        return true;
    }

    private function validateFields(): bool
    {
        $errorsMap = [
            'getName'      => "O Nome precisa ser informado!",
            'getEmail'     => "O E-mail precisa ser informado!",
            'getBirthdate' => "A data de nascimento precisa ser informada!",
            'getInstagram' => "Seu usuário no instagram precisa ser informado!",
            'getGender'    => "O sexo precisa ser informado!"
        ];

        foreach ($errorsMap as $methodName => $errorMessage) {
            if (!$this->validateFieldPresence($this->user->{$methodName}()))
                $this->errors[] = $errorMessage;
        }
        if (!empty($this->errors))
            return false;
        return true;
    }
}

?>

