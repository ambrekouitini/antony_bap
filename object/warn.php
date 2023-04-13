<?php

class Warn
{
    public function __construct(
        public string $nom,
        public string $prenom,
        public string $email,
        public string $phone,
        public string $retour,
    )
    {
    }

    public function verify(): bool
    {
        $isValid = true;

        if ($this->nom === '' || $this->prenom === '' || $this->email === '' || $this->phone === '' || $this->retour === '') {
            $isValid = false;
        }
        return $isValid;
    }
}