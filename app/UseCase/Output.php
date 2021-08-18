<?php

namespace App\UseCase;

abstract class Output
{
    /**
     * @return array
     */
    abstract public function toArray(): array;
}
