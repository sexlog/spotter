<?php

    use GeoIp2\Database\Reader;
    use Sexlog\Spotter\Providers\MaxMind;
    use Sexlog\Spotter\Spotter;

    require(__DIR__ . '/../vendor/autoload.php');

    // Path to Maxmind's GeoIp2 Database
    $geoIpPath = __DIR__ . '/../resources/GeoIP2-City.mmdb';

    // Reader instance
    $reader = new Reader($geoIpPath);

    // MaxMind Provider
    $maxMindProvider = new MaxMind($reader);

    // The ip to look for in the database
    $ip = '179.127.62.13';

    $spotter = new Spotter($maxMindProvider, $ip);

    echo $spotter->getCityName();
