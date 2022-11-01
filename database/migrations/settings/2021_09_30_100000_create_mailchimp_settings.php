<?php

use Spatie\LaravelSettings\Migrations\SettingsMigration;

class CreateMailchimpSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('mailchimp.enabled', false);
        $this->migrator->addEncrypted('mailchimp.api_key', '');
        $this->migrator->add('mailchimp.server_prefix', '');
    }

    public function down()
    {
        $this->migrator->delete('mailchimp.enabled');
        $this->migrator->delete('mailchimp.api_key');
        $this->migrator->delete('mailchimp.server_prefix');
    }
}
