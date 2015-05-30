{* widget: text; action: index; translation: widget.text.hero *}

{include 'cms/helper/text'}

<div class="container">
    <div class="text block text--hero text--center {$app.cms.properties->getWidgetProperty('style.container')}" id="widget-{$app.cms.widget}">
        {call renderTextSimple}
    </div>
</div>
