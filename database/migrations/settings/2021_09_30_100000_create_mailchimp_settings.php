<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateMailchimpSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('mailchimp.enabled', false);
        // $this->migrator->add('mailchimp.url', '');
        // $this->migrator->addEncrypted('mailchimp.access_token', '');
    }

    public function down()
    {
        $this->migrator->delete('mailchimp.enabled');
        // $this->migrator->delete('mailchimp.url');
        // $this->migrator->delete('mailchimp.access_token');
    }
}
