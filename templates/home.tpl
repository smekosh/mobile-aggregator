{extends file="template.tpl"}

{block name="head"}
{/block}

{block name="body"}

{foreach from=$feed item=item}

<div class="item">
    <div class="item_inner">
        <h2 class="title">
            <a href="{$item->link}?src=persagg-title">{$item->title}</a>
        </h2>
        <div class="item_body">
{if $item->enclosure}
            <div class="item_img"><a href="{$item->link}?src=persagg-img"><img src="{$item->enclosure.url|pangea:120}" /></a></div>
{/if}
            <p class="description">{$item->description|truncate:150}</p>
        </div>
        <div class="clear"></div>
        <div class="website">
            <span class="favicon c_{$item->link|hostname|md5}"></span>
            <span class="hostname">{$item->link|hostname}</span>
        </div>
    </div>
</div>

{/foreach}

{/block}

{block name="foot"}
{/block}
