<?php

class Feedback
{
    public function __construct(
        public string $establishment,
        public string $name,
        public string $mail,
        public string $comment,
    )
    {
    }

    public function verify():bool
    {
        $isValid = true;
        if ($this->establishment === '' || $this->name === '' || $this->mail === '' || $this->comment === '') {
            $isValid = false;
        }
        return $isValid;

    }

}