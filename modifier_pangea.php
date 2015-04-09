<?php

/*
given a URL and a width, recompose the URL for CDN/GDB resizing
*/

function smarty_modifier_pangea($url, $width = 300) {
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

    $f = pathinfo($u["path"]);

    /*
    $f ex: Array (
        [dirname] => \
        [basename] => 5FF77446-311F-4B30-BF8E-E19DDFF9FEAB_w800_h450.jpg
        [extension] => jpg
        [filename] => 5FF77446-311F-4B30-BF8E-E19DDFF9FEAB_w800_h450
    )*/

    $base = $f["filename"];
    $a = stripos($base, "_");
    if( $a !== false ) {
        $base = substr($base, 0, $a);
    }

    $new_url = sprintf(
        "%s://%s/%s_w%s.%s",
        $u["scheme"],
        $u["host"],
        $base,
        $width,
        $f["extension"]
    );

    return( $new_url );
}
