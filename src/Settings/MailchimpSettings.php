<?php

namespace Astrogoat\Mailchimp\Settings;

use Helix\Lego\Settings\AppSettings;
use Illuminate\Validation\Rule;
use Astrogoat\Mailchimp\Actions\MailchimpAction;

class MailchimpSettings extends AppSettings
{
    // public string $url;

    public function rules(): array
    {
        return [
            // 'url' => Rule::requiredIf($this->enabled === true),
        ];
    }

    // protected static array $actions = [
    //     MailchimpAction::class,
    // ];

    // public static function encrypted(): array
    // {
    //     return ['access_token'];
    // }

    public function description(): string
    {
        return 'Interact with Mailchimp.';
    }

    public static function group(): string
    {
        return 'mailchimp';
    }
}
