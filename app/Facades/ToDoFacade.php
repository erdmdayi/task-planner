<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class ToDoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'todo-facade';
    }
}
