<?php

    namespace Sexlog\Spotter\Providers;

    interface ProviderInterface
    {
        public function getLocationProperty($property, $ip);
    }
