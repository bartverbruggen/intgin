{include 'cms/helper/general'}

{function renderTitle title=null}
    {if $title}
        <h2 class="toc {$app.cms.properties->getWidgetProperty('style.title')}">{$title}</h2>
    {/if}
{/function}

{function renderFilter filters=null}
    {if $filters}
        {include 'cms/helper/orm.filter.form'}
    {/if}
{/function}

{function renderPagination pagination=null}
    {if $pagination}
        {if $pagination->getPages() >= $pagination->getPage() && $pagination->getPages() > 1}
            <div class="pagination">
                {pagination href=$pagination->getHref() pages=$pagination->getPages() page=$pagination->getPage()}
            </div>
        {/if}
    {/if}
{/function}

{function renderMore moreUrl=null moreLabel=null}
    {if $moreUrl}
        <div class="excerpt__more">
            <a href="{$moreUrl}" class="excpert__more-link link--arrow">{$moreLabel}</a>
        </div>
    {/if}
{/function}

{function renderEmpty emptyResultMessage=null}
    <p class="excerpt__empty">{$emptyResultMessage|text}</p>
{/function}

{function renderOverviewBlock class="excerpt" url=null image=null title=null teaser=null more=true date=null meta=null}
    {if $url}
        <a href="{$url}" class="{$class}">
    {else}
        <div class="{$class}">
    {/if}
        {if $image}
            <div class="excerpt__aside">
                <div class="excerpt__img">
                    <img src="{image src=$image width=125 height=125 transformation="resize"}" class="image image--full-width" />
                </div>
            </div>
        {/if}
        <div class="excerpt__main">
            <div class="excerpt__header">
                <h3 class="excerpt__title">{$title}</h3>
                {if $date}
                    <div class="excerpt__date">{call renderSimpleDate date=$date}</div>
                {/if}
                {if $meta}
                    <div class="meta">
                        {foreach $meta as $itemClass => $item}
                            <div class="meta__item meta__item--{$itemClass}">{$item}</div>
                        {/foreach}
                    </div>
                {/if}
            </div>
            <div class="excerpt__ct">
                {$teaser}
                {if $more && $url}<span class="excerpt__link">{translate key="label.readmore"} &rsaquo;</span>{/if}
            </div>
        </div>
    {if $url}
        </a>
    {else}
        </div>
    {/if}
{/function}
