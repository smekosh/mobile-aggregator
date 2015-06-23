
{capture assign=html}

{foreach from=$feed item=item}

<div class="row">

</div>

<div class="row">

{if $item->enclosure}
<div class="pull-left col-md-4">
    <a href="{$item->link}?src=persagg-img">
        <img class="img-thumbnail" src="{$item->enclosure.url|pangea:200}" />
    </a>
</div>
{/if}

<div class="col-md-8 text-left row">
    <h4>
        <a class="text-info" href="{$item->link}?src=persagg-title">{$item->title}</a>
    </h4>
    <p class="description">
        <a class="text-muted" href="{$item->link}?src=persagg-text">{$item->description}</a>
    </p>
{capture assign=url}{$config.home}/cache/Untitled-2.png{/capture}
    <a href="{$item->link}?src=persagg-logo"><img src="{$url|datauri}" /></a>
</div>

</div>

{/foreach}

{/capture}

{$html}
{*
$(".col-sm-12").html({$html|json_encode});
*}
