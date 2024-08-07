<?php

namespace Astrogoat\Mailchimp;

use Astrogoat\Mailchimp\Settings\Peripherals\Lists;
use Astrogoat\Mailchimp\Http\Livewire\SubscribeToList;
use Astrogoat\Mailchimp\Promobar\Types\MailchimpType;
use Astrogoat\Mailchimp\Settings\MailchimpSettings;
use Helix\Lego\Apps\App;
use Helix\Lego\LegoManager;
use Illuminate\Container\Container;
use Livewire\Livewire;
use MailchimpMarketing\ApiClient;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class MailchimpServiceProvider extends PackageServiceProvider
{
    public function registerApp(App $app)
    {
        return $app
            ->name('mailchimp')
            ->settings(MailchimpSettings::class)
            ->migrations([
                __DIR__ . '/../database/migrations/settings',
            ])->callAfterRegistering(function (App $mailchimpApp) {
                app()->bind(Mailchimp::class, function (Container $app) {
                    $settings = $app->make(MailchimpSettings::class);
                    $mailchimp = new ApiClient();
                    $mailchimp->setConfig([
                        'apiKey' => $settings->api_key,
                        'server' => $settings->server_prefix,
                    ]);

                    return $mailchimp;
                });

                $this->callAfterResolving('Astrogoat\\Promobar\\Promobar', function ($promobar) use ($mailchimpApp) {
                    if ($mailchimpApp->isEnabled()) {
                        $promobar->addType('mailchimp', MailchimpType::class);
                    }
                });
            });
    }

    public function registeringPackage()
    {
        $this->callAfterResolving('lego', function (LegoManager $lego) {
            $lego->registerApp(fn (App $app) => $this->registerApp($app));
        });
    }

    public function bootingPackage()
    {
        Livewire::component('astrogoat.mailchimp.subscribe-to-list', SubscribeToList::class);
        Livewire::component('astrogoat.mailchimp.settings.peripherals.lists', Lists::class);
    }

    public function configurePackage(Package $package): void
    {
        $package->name('mailchimp')->hasConfigFile()->hasViews();
    }
}
