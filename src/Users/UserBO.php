<?php

namespace Users;

class UserBO
{
    private Models\User $user;

    public function __construct(Models\User $user)
    {
        $this->user = $user;
    }

    public function calculateAge(): string
    {
        $today = new \DateTime(date('Y-m-d'));
        $birthdate = new \DateTime($this->user->getBirthdate());

        $diff = $today->diff($birthdate)->format('%y');

        return (($diff > 1) ? "$diff anos" : "$diff ano");
    }
}

?>
