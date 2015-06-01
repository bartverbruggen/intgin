{* widget: orm.overview action: index; translation: template.orm.overview.block *}

{include 'cms/helper/orm-overview'}

<div class="block {$app.cms.properties->getWidgetProperty('style.container')}" id="widget-{$app.cms.widget}">

    {call renderTitle title=$title}

    {call renderFilter filters=$filters}

    {if $result}
        {foreach from=$result item="content"}
            {$excerptClass = "excerpt excerpt--{$content->type|strtolower} excerpt--{cycle values="odd,even"}"}
            {*
                Render the default overview block
                image
                title
                teaser
                more: boolean for rendering a more link
                date: renders the date with the default date_format
                meta: accepts an array with [$class => $copy]
            *}
            {call renderOverviewBlock class=$excerptClass image=$content->image title=$content->title url=$content->url teaser=$content->teaser}
        {/foreach}

        {call renderPagination pagination=$pagination}

        {call renderMore moreUrl=$moreUrl moreLabel=$moreLabel}
    {else}
        {call renderEmpty emptyResultMessage=$emptyResultMessage}
    {/if}
</div>
