<?php

/*
CLI program
php -f is_valid.php url

returns "yes" or "no"
*/

if( !isset($argc) ) die( "this is a CLI program :\\");
if( $argc <> 2 ) die( "need a url" );

require( "vendor/autoload.php" );
require( "config.php" );
require( "modifier_pangea.php" );
require( "modifier_hostname.php" );

date_default_timezone_set('Europe/Prague');

$url = $config["local"] . $argv[1];

try {
    $feed = Feed::loadRss($url);
    echo "yes";
} catch( Exception $err ) {
    echo "no";
}
