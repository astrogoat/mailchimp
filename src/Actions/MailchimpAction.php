<?php

namespace Astrogoat\Mailchimp\Actions;

use Helix\Lego\Apps\Actions\Action;

class MailchimpAction extends Action
{
    public static function actionName(): string
    {
        return 'Mailchimp action name';
    }

    public static function run(): mixed
    {
        return redirect()->back();
    }
}
