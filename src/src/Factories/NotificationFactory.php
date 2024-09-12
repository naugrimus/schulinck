<?php

namespace App\Factories;

use NotificationProviderInterface;
class NotificationFactory
{

    protected array $notificationProviders;
    public function __construct( array $notificationProviders)
    {
        $this->notificationProviders = $notificationProviders;
    }

    public function create(string $providerType) {
        foreach($this->notificationProviders as $provider) {
            if($provider instanceof NotificationProviderInterface && $providerType == $provider->getType()) {
                return new $provider();
            }
        }
    }
}