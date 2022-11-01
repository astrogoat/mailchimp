<?php

namespace Astrogoat\Mailchimp\Http\Livewire;

use Astrogoat\Mailchimp\Mailchimp;
use Livewire\Component;

class SubscribeToList extends Component
{
    public string $prompt = '';
    public string $buttonText = '';
    public string $successfulResponse = '';

    public string $listId;

    public string $email = '';

    public bool $subscribed = false;

    public bool $hideAfter = false;

    protected $rules = [
        'listId' => 'required',
        'email' => 'required|email',
    ];

    public function subscribe()
    {
        $this->validate();

        /** @var \MailchimpMarketing\ApiClient $mailchimp */
        $mailchimp = app(Mailchimp::class);
        $mailchimp->lists->setListMember($this->listId, $this->email, [
            'email_address' => $this->email,
            'status' => 'pending',
        ]);

        $this->subscribed = true;
        session()->put('astrogoat.mailchimp', [
            'lists' => [
                'id' => $this->listId,
                'email' => $this->email,
                'status' => 'subscribed',
            ],
        ]);
    }

    public function render()
    {
        return view('mailchimp::livewire.subscribe-to-list');
    }
}
