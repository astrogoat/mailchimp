<?php

namespace Astrogoat\Mailchimp\Settings\Peripherals;

use Exception;
use Helix\Fabrick\Notification;
use MailchimpMarketing\ApiClient;
use Astrogoat\Mailchimp\Mailchimp;
use Helix\Lego\Settings\MailSettings;
use Helix\Lego\Settings\Peripherals\Peripheral;
use Astrogoat\Mailchimp\Settings\MailchimpSettings;
use Helix\Lego\Http\Livewire\Traits\ProvidesFeedback;

class Lists extends Peripheral
{
    use ProvidesFeedback;

    public array $create = [
        'campaign_defaults' => [
            'language' => 'en'
        ],
    ];

    public function mount()
    {
        $mailSettings = resolve(MailSettings::class);
        $this->create['campaign_defaults']['from_name'] = $mailSettings->from_name;
        $this->create['campaign_defaults']['from_email'] = $mailSettings->from_address;
        $this->create['email_type_option'] = false;
    }

    public function lists(): array
    {
        if (app(MailchimpSettings::class)->enabled) {
            /** @var ApiClient $mailchimp */
            $mailchimp = resolve(Mailchimp::class);

            return $mailchimp->lists->getAllLists()->lists;
        }

        return [];
    }

    public function create()
    {
        /** @var ApiClient $mailchimp */
        $mailchimp = resolve(Mailchimp::class);
        try {
            return $mailchimp->lists->createList([
                'name' => $this->create['name'],
                'permission_reminder' => $this->create['permission_reminder'],
                'email_type_option' => $this->create['email_type_option'],
                'contact' => [
                    'company' => $this->create['contact']['company'],
                    'address1' => $this->create['contact']['address1'],
                    'city' => $this->create['contact']['city'],
                    'country' => $this->create['contact']['country'],
                ],
                'campaign_defaults' => [
                    'from_name' => $this->create['campaign_defaults']['from_name'],
                    'from_email' => $this->create['campaign_defaults']['from_email'],
                    'subject' => $this->create['campaign_defaults']['subject'],
                    'language' => $this->create['campaign_defaults']['language'],
                ],
            ]);
        } catch (Exception $exception) {
            $this->notify(Notification::error('Unable to create list', $exception->getMessage()));
        }
    }

    public function render()
    {
        return view('mailchimp::settings.peripherals.lists');
    }
}
