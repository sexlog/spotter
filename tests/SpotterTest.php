<?php

    use GeoIp2\Database\Reader;
    use Sexlog\Spotter\Providers\MaxMind;
    use Sexlog\Spotter\Spotter;

    class GeoIpTest extends PHPUnit_Framework_TestCase
    {
        /**
         * @var \Sexlog\Spotter\Spotter
         */
        private $spotter;

        protected function setUp()
        {
            $reader          = new Reader(__DIR__ . '/../resources/GeoIP2-City.mmdb');
            $maxMindProvider = new MaxMind($reader);

            $this->spotter = new Spotter($maxMindProvider, null);
        }

        public function testEmptyIP()
        {
            $this->setExpectedException('Sexlog\Spotter\Exceptions\InvalidIpException');
            $this->spotter->getCityName();
        }
    }
