<?php

class Contact
{
    public function __construct(
        public string $etablissement,
        public string $nom,
        public string $retour,
    )
    {
    }

    public function verify(): bool
    {
        $isValid = true;

        if ($this->etablissement === '' || $this->nom === '' || $this->retour === '') {
            $isValid = false;
        }
        return $isValid;
    }
}