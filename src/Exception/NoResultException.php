<?php

namespace App\Exception;

use App\Exception\ExceptionInterface;

class NoResultException extends \Exception implements ExceptionInterface
{
    public function __construct()
    {
        $message = 'No result found';
        parent::__construct($message);
    }
}
