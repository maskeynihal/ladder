<?php


namespace maskeynihal\ladder\Facades;

use Illuminate\Support\Facades\Facade;

class Ladder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Ladder'; 
    }
}

