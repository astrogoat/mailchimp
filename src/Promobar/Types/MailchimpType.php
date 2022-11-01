<?php

namespace Astrogoat\Mailchimp\Promobar\Types;

use Astrogoat\Promobar\Types\PromobarType;

class MailchimpType extends PromobarType
{
    public function renderSettings(): string
    {
        return 'mailchimp::promobar.settings';
    }

    public function renderComponent(): string
    {
        return 'mailchimp::promobar.component';
    }
}
