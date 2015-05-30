{* widget: title; action: index; name: Default title *}

<div class="block {$app.cms.properties->getWidgetProperty('style.container')}" id="widget-{$app.cms.widget}">
    <h1 class="{$app.cms.properties->getWidgetProperty('style.title')}">{$app.cms.context.title.node|text}</h1>
</div>
