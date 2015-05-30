{* widget: text; action: index; translation: widget.text.server.status *}

{include 'cms/helper/text'}

{if !$app.user}
    <div class="text block {$app.cms.properties->getWidgetProperty('style.container')}" id="widget-{$app.cms.widget}">
        {call renderText titleClass="heading--border"}
    </div>
{/if}
