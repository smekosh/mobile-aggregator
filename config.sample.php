<?php

$config = array(
    "home" => "http://example1.com", # no trailing slash
    "rss" => array(
        "http://example1.com/rss/",
        "http://example2.com/rss/"
    ),
    "local" => "http://localhost/mobile-aggregator/local/",
    "before_content" =>
<<< EOF

<!-- Metrics code here -->
<!-- End Metrics code here -->

EOF

);
