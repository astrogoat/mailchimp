<?php

namespace Astrogoat\Mailchimp\Commands;

use Illuminate\Console\Command;

class MailchimpCommand extends Command
{
    public $signature = 'mailchimp';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
