<?php

    namespace Sexlog\Spotter\Providers;

    use GeoIp2\Database\Reader;
    use Sexlog\Spotter\Exceptions\InvalidIpException;
    use Sexlog\Spotter\Exceptions\MissingPropertiesException;

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
         * @param string $properties
         * @param string $ip
         */
        public function getProperty($properties, $ip)
        {
            if (!$this->isValidIp($ip))
            {
                throw new InvalidIpException;
            }

            $location = array_shift($properties);
            $property = array_shift($properties);

            if (!$location || !$property)
            {
                throw new MissingPropertiesException;
            }

            $record = $this->reader->city($ip);

            return $record->{$location}->{$property};
        }
    }
