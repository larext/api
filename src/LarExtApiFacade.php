<?php

namespace LarExt\API;

use Illuminate\Support\Facades\Facade;

class LarExtApiFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'larextapi';
    }
}