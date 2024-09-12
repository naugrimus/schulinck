<?php
namespace App\Tests\Notifier;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Factories\NotificationFactory;
class sendNotificationTest extends KernelTestCase
{

    public function willSendEmailNotification() {
        // actual implementation is not tested yet
        self::bootKernel();

        $container = static::getContainer();
        $factory = $container->get(NotificationFactory::class);
        $this->assertTrue($factory->send('SMS'));

    }
}