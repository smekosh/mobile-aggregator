<?php
require( "vendor/autoload.php" );
require( "config.php" );
require( "modifier_pangea.php" );
require( "modifier_hostname.php" );

date_default_timezone_set('Europe/Prague');
if( !isset($config) ) die( "ERROR: config file missing?");

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

// let templating display rest
$smarty = new Smarty();
$smarty->assign( "feed", $all );
$smarty->display('home.tpl');
