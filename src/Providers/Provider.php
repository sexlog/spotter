<?php

    namespace Sexlog\Spotter\Providers;

    abstract class Provider
    {
        protected function isValidIp($ip)
        {
            if (filter_var($ip, FILTER_VALIDATE_IP))
            {
                return true;
            }

            return false;
        }
    }
