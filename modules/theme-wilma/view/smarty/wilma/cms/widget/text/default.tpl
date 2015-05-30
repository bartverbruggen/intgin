{* widget: text; action: index; translation: widget.text *}

{include 'cms/helper/text'}

<div class="text block {$app.cms.properties->getWidgetProperty('style.container')}" id="widget-{$app.cms.widget}">
    {call renderText titleClass="heading--border"}
</div>
