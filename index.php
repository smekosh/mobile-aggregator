<?php
require( "vendor/autoload.php" );
require( "config.php" );
require( "modifier_pangea.php" );
require( "modifier_hostname.php" );
require( "modifier_datauri.php" );

date_default_timezone_set('Europe/Prague');
if( !isset($config) ) die( "ERROR: config file missing?");

// options for site variants
if( isset($_GET['config']) ) {
    $alt_config = "config_" . $_GET['config'];
    if( !isset( $$alt_config ) ) die( "ERROR: alternate config missing?" );
    $config = $$alt_config;
}

// required: cron task to wget RSS files, dump into /local/md5*
$feeds = array();
foreach( $config["rss"] as $url ) {
    $file = sprintf("%s.rss", md5($url));
    $url_location = $config["local"] . $file;

    try {
        $feeds[] = Feed::loadRss($url_location);
    } catch( Exception $err ) {
        // an exception means empty
    }
}

// combine all feed items into $all
$all = array();
foreach( $feeds as $feed ) {
    foreach( $feed->item as $item ) {
        $all[] = $item;
    }
}

// sort $all items by timestamp
usort( $all, function($a, $b) {
    $ts_a = strtotime($a->pubDate);
    $ts_b = strtotime($b->pubDate);

    if( $ts_a > $ts_b ) return( -1 );
    if( $ts_a < $ts_b ) return( 1 );
    return( 0 );
});

// limit entries, if configured to do so
if( isset( $config["limit"] ) ) {
    $all = array_slice( $all, 0, $config["limit"] );
}

// let templating display rest
header( "Content-Type: text/html; charset=utf-8" );
$smarty = new Smarty();
$smarty->assign( "feed", $all );
$smarty->assign( "config", $config );
$smarty->display( $config["template"] );
