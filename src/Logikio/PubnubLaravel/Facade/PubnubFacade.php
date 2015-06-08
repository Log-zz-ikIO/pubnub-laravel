<?php namespace Logikio\PubnubLaravel\Facade;

use Illuminate\Support\Facades\Facade;

class PubnubFacade extends Facade {

    protected static function getFacadeAccessor() { 
    	return 'pn'; 
    }

}