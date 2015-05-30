{* widget: orm.overview action: index; translation: template.orm.overview.list *}

{include 'cms/helper/orm-overview'}

<div class="block {$app.cms.properties->getWidgetProperty('style.container')}" id="widget-{$app.cms.widget}">

    {call renderTitle title=$title}

    {call renderFilter filters=$filters}

    {if $result}
        <ul>
        {foreach from=$result item="content"}
            <li>{if $content->url}<a href="{$content->url}">{$content->title}</a>{else}{$content->title}{/if}</li>
        {/foreach}
        </ul>

        {if $pagination}
            {pagination href=$pagination->getHref() pages=$pagination->getPages() page=$pagination->getPage()}
        {/if}

        {if $moreUrl}
        <p><a href="{$moreUrl}" class="more">{$moreLabel}</a></p>
        {/if}
    {else}
        <p>{$emptyResultMessage|text}</p>
    {/if}
</div>
