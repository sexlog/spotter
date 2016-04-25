<?php

    namespace Sexlog\Spotter;

    use Sexlog\Spotter\Providers\ProviderInterface;

    class Spotter
    {
        /**
         * @var String
         */
        private $ip;

        /**
         * @var \Sexlog\Spotter\Providers\ProviderInterface
         */
        private $provider;

        /**
         * @param \Sexlog\Spotter\Providers\ProviderInterface $provider
         * @param string                                      $ip
         */
        public function __construct(ProviderInterface $provider, $ip)
        {
            $this->provider = $provider;

            $this->ip = $ip;
        }

        /**
         * @return String
         */
        public function getIp()
        {
            return $this->ip;
        }

        /**
         * @param String $ip
         */
        public function setIp($ip)
        {
            $this->ip = $ip;
        }

        public function getCityName()
        {
            return $this->provider->getProperty('city-name', $this->ip);
        }

        public function getCountryName()
        {
            return $this->provider->getProperty('country-name', $this->ip);
        }
    }
