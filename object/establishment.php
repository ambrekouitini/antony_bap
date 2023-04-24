<?php

class Establishment
{
    public function __construct(
        public string $owner_firstname,
        public string $owner_lastname,
        public string $owner_email,
        public int $owner_number,
        public string $establishment_name,
        public string $establishment_adress,
    )
    {
    }

    public function verify():bool
    {
        $isValid = true;

        if ($this->owner_firstname === '' || $this->owner_lastname === '' || $this->owner_email === '' || $this->owner_number === '' || $this->establishment_name === ''|| $this->establishment_adress === '') {
            $isValid = false;
        }
        return $isValid;

    }

}