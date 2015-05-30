{* widget: text; action: index; translation: widget.text.panel *}

{include 'cms/helper/text'}

<div class="text block block--panel {$app.cms.properties->getWidgetProperty('style.container')}" id="widget-{$app.cms.widget}">
    {call renderText titleClass="heading--border"}
</div>
