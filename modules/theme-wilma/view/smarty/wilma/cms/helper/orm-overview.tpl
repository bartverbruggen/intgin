{function renderTitle title=null}
    {if $title}
        <h2 class="toc heading--3 {$app.cms.properties->getWidgetProperty('style.title')}">{$title}</h2>
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
