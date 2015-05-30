{* widget: orm.overview action: index; translation: widget.orm.overview.news *}

{include 'cms/helper/orm-overview'}

<div class="block block--panel {$app.cms.properties->getWidgetProperty('style.container')}" id="widget-{$app.cms.widget}">

    {call renderTitle title=$title}

    {call renderFilter filters=$filters}

    {if $result}
        {foreach from=$result item="content"}
            {$excerptClass = "excerpt excerpt--{$content->type|strtolower} excerpt--{cycle values="odd,even"}"}
            {if $content->url}
                <a href="{$content->url}" class="{$excerptClass}">
            {else}
                <div class="{$excerptClass}">
            {/if}
                {if $content->image}
                    <div class="excerpt__aside">
                        <div class="excerpt__img">
                            <img src="{image src=$content->image width=125 height=125 transformation="resize"}" class="image image--full-width" />
                        </div>
                    </div>
                {/if}
                <div class="excerpt__main">
                    <div class="excerpt__header">
                        <h3 class="excerpt__title">{$content->title}</h3>
                        <h3 class="excerpt__date">{$content->title}</h3>
                    </div>
                    <div class="excerpt__ct">
                        {$content->teaser}
                        {if $content->url}<span class="excerpt__link link--arrow">{translate key="label.readmore"}</span>{/if}
                    </div>
                </div>
            {if $content->url}
                </a>
            {else}
                </div>
            {/if}
        {/foreach}

        {call renderPagination pagination=$pagination}

        {call renderMore moreUrl=$moreUrl moreLabel=$moreLabel}
    {else}
        {call renderEmpty emptyResultMessage=$emptyResultMessage}
    {/if}
</div>
