<?php
declare(strict_types=1);

namespace Users\Models;

class User 
{
    public function __construct(
        private string $name, 
        private string $email,
        private string $birthdate,
        private string $instagram,
        private string $gender,
        private array $hobbies
    ) {}

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setBirthdate(string $birthdate): void
    {
        $this->birthdate = $birthdate;
    }

    public function setInstagram(string $instagram): void
    {
        $this->instagram = $instagram;
    }

    public function setGender(string $gender): void
    {
        $this->gender = $gender;
    }

    public function setHobbies(string $hobby): void
    {
        $this->hobbies[] = $hobby;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getBirthdate(): string
    {
        return $this->birthdate;
    }

    public function getInstagram(): string
    {
        return $this->instagram;
    }

    public function getGender(): string
    {
        return $this->gender;
    }

    public function getHobbies(): array
    {
        return $this->hobbies;
    }

    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
?>
