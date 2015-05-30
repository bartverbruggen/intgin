{* widget: files action: index; translation: widget.files.gallery *}

{if $files}
    <div class="block block--files block--bg {$app.cms.properties->getWidgetProperty('style.container')}" id="widget-{$app.cms.widget}">
    {if $title}
        <h2 class="toc {$app.cms.properties->getWidgetProperty('style.title')}">{$title}</h2>
    {/if}
        <div class="{$app.cms.properties->getWidgetProperty('style.list')}">
            {call renderAssets assets=$files}
        </div>
    </div>
{/if}
