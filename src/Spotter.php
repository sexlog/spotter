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

        /**
         * @return mixed
         */
        public function getCityName()
        {
            return $this->provider->getLocationProperty(['city', 'name'], $this->ip);
        }

        /**
         * @return mixed
         */
        public function getCountryName()
        {
            return $this->provider->getLocationProperty(['country', 'name'], $this->ip);
        }

        /**
         * @return mixed
         */
        public function getCountryIsoCode()
        {
            return $this->provider->getLocationProperty(['country', 'isoCode'], $this->ip);
        }

        /**
         * @return mixed
         */
        public function getPostalCode()
        {
            return $this->provider->getLocationProperty(['postal','code'], $this->ip);
        }

        /**
         * @return mixed
         */
        public function getLatitude()
        {
            return $this->provider->getLocationProperty(['location','latitude'], $this->ip);
        }

        /**
         * @return mixed
         */
        public function getLongitude()
        {
            return $this->provider->getLocationProperty(['location','longitude'], $this->ip);
        }

    }
