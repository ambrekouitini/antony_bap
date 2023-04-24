<?php

class User
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $role,
    )
    {
    }

    public function verify(): bool
    {
        $isValid = true;

        if ($this->name === '' || $this->email === '' || $this->password === '' || $this->role === '') {
            $isValid = false;
        }
        return $isValid;
    }
}