<?php

/*
given a URL and a width, recompose the URL for CDN/GDB resizing
*/

function smarty_modifier_hostname($url) {
    $u = parse_url( $url );

    if( $u === false ) return($url);
    if( !isset($u["scheme"]) ) return($url);
    if( !isset($u["host"]) ) return($url);
    if( !isset($u["path"]) ) return($url);

    /*
    $u ex: Array (
    [scheme] => http
    [host] => gdb.voanews.com
    [path] => /5FF77446-311F-4B30-BF8E-E19DDFF9FEAB_w800_h450.jpg
    )
    */

    return( $u["host"] );
}
