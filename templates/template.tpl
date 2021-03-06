<!doctype html>
<html xml:lang="fa" lang="fa">
<head>
    <meta charset="utf-8" />
	<meta content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=3.0, user-scalable=yes" name="viewport" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="Content-Language" content="fa" />
    <link rel="stylesheet" href="{$config.home}/reset.css" type="text/css" />
    <link rel="stylesheet" href="{$config.home}/aggregator.css?v=0.03" type="text/css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <script src="//cdn.optimizely.com/js/2326530349.js"></script>
    <script type="text/javascript" src="{$config.home}/layout.js"></script>
{block name="head"}

{/block}
</head>
<body class="body_{$config.direction}">

{$config.before_content}

<div class="content" dir="{$config.direction}">
{block name="body"}

{/block}
</div>

{block name="foot"}

{/block}

</body>
</html>
