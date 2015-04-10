{extends file="template.tpl"}

{block name="head"}
{/block}

{block name="body"}

{foreach from=$feed item=item}

<div class="item">
    <div class="item_inner">
        <h2 class="title">
            <a href="{$item->link}">{$item->title}</a>
        </h2>
        <div class="item_body">
{if $item->enclosure}
            <div class="item_img"><a href="{$item->link}"><img src="{$item->enclosure.url|pangea:360}" /></a></div>
{/if}
            <p class="description">{$item->description}</p>
        </div>
        <div class="clear"></div>
    </div>
</div>

{/foreach}

{/block}

{block name="foot"}
{/block}
