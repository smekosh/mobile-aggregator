{if isset($smarty.get.json)}
{strip}
{$ret = array()}

{foreach from=$feed item=item}
{$ret["link"] = $item->link|lower}
{$ret["title"] = $item->title|lower}
{$ret["description"] = $item->description|lower}

{if $item->enclosure}
{capture assign=image_source}{$item->enclosure.url|pangea:200:150}{/capture}
{/if}

{if $image_source|strlen>40}
{$ret["thumbnail"] = $image_source}
{/if}

{/foreach}




{/strip}{$ret|json_encode}{else}
{foreach from=$feed item=item}
{if $item->enclosure}
{capture assign=image_source}{$item->enclosure.url|pangea:200:150}{/capture}
{/if}
<div class="row">
{if $image_source|strlen>40}
    <div class="pull-left col-md-4">
        <a href="{$item->link}?trk1&src=persagg-img">
            <img class="img-thumbnail" src="{$image_source}" />
        </a>
    </div>
{/if}
    <div class="col-md-8 text-left row">
        <h4>
            <a class="text-info" href="{$item->link}?trk1&src=persagg-title">{$item->title}</a>
        </h4>
        <p class="description">
            <a class="text-muted" href="{$item->link}?trk1&src=persagg-text">{$item->description}</a>
        </p>
{capture assign=url}{$config.home}/cache/Untitled-2.png{/capture}
        <a href="{$item->link}?trk1&src=persagg-logo"><img src="{$config.home}/img/voa-tr.png" /></a>
    </div>
</div>
{/foreach}

{/if}
