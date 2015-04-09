{extends file="template.tpl"}

{block name="head"}
{/block}

{block name="body"}

{foreach from=$feed item=item}

<div class="item">
    <div class="item_inner">
        <div class="title">
            <a href="{$item->link}">{$item->title}</a>
        </div>
        <div class="description">
{if $item->enclosure}
            <a href="{$item->link}">
                <img src="{$item->enclosure.url|pangea:300}" />
            </a>
{/if}
            {$item->description}
            <div class="clear"></div>
        </div>
    </div>
</div>

{/foreach}

{/block}

{block name="foot"}
{/block}
