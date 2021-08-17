<?php

namespace App\UseCase;

abstract class Response
{
    /**
     * @return array
     */
    abstract public function toArray(): array;
}
