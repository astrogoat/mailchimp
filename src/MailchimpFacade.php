<?php

namespace Astrogoat\Mailchimp;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Astrogoat\Mailchimp\Mailchimp
 */
class MailchimpFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'mailchimp';
    }
}
