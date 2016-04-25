<?php

    namespace Sexlog\Spotter\Providers;

    use GeoIp2\Database\Reader;
    use Sexlog\Spotter\Exceptions\InvalidIpException;

    class MaxMind extends Provider implements ProviderInterface
    {
        /**
         * @var \GeoIp2\Database\Reader
         */
        private $reader;

        public function __construct(Reader $reader)
        {
            $this->reader = $reader;
        }

        /**
         * @param string $property
         * @param string $ip
         */
        public function getProperty($property, $ip)
        {
            if (!$this->isValidIp($ip))
            {
                throw new InvalidIpException;
            }

            $city = $this->reader->city($ip);

            return $city->name;
        }
    }
