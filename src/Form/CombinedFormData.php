<?php
namespace App\Form;

use App\Entity\Session;
use App\Entity\Exercises;

class CombinedFormData
{
    private ?Session $session;
    private ?Exercises $exercise;

    public function getSession(): ?Session
    {
        return $this->session;
    }

    public function setSession(?Session $session): void
    {
        $this->session = $session;
    }

    public function getExercise(): ?Exercises
    {
        return $this->exercise;
    }

    public function setExercise(?Exercises $exercise): void
    {
        $this->exercise = $exercise;
    }
}