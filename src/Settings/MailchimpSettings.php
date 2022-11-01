<?php

namespace Astrogoat\Mailchimp\Settings;

use Helix\Lego\Settings\AppSettings;
use Illuminate\Validation\Rule;

class MailchimpSettings extends AppSettings
{
    public string $api_key;
    public string $server_prefix;

    public function rules(): array
    {
        return [
            'api_key' => Rule::requiredIf($this->enabled === true),
            'server_prefix' => Rule::requiredIf($this->enabled === true),
        ];
    }

    public static function encrypted(): array
    {
        return ['api_key'];
    }

    public function description(): string
    {
        return 'Interact with Mailchimp.';
    }

    public static function group(): string
    {
        return 'mailchimp';
    }

    public function help(): array
    {
        return [
            'api_key' => 'Navigate to the <a href="https://us1.admin.mailchimp.com/account/api/" target="_blank">API Keys section</a> of your Mailchimp account.',
            'server_prefix' => 'To find the value for the server prefix, log into your Mailchimp account and look at the URL in your browser. You’ll see something like https://us19.admin.mailchimp.com/; the "us19" part is the server prefix.',
        ];
    }
}
