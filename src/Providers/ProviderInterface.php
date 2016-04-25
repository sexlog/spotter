<?php

    namespace Sexlog\Spotter\Providers;

    interface ProviderInterface
    {
        public function getProperty($property, $ip);
    }
