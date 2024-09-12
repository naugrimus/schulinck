<?php

interface NotificationProviderInterface
{
    public function send(string $message): bool;
}