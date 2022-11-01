<?php

namespace Astrogoat\Mailchimp\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Astrogoat\Mailchimp\Mailchimp
 */
class Mailchimp extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Astrogoat\Mailchimp\Mailchimp::class;
    }
}
