<?php

namespace App\Exception;

use App\Exception\ExceptionInterface;

class EntityNotFoundException extends \Exception implements ExceptionInterface
{
    public function __construct($id)
    {
        $message = 'No entity with id: ' . $id;
        parent::__construct($message);
    }
}
