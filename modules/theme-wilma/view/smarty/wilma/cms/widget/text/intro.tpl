{* widget: text; action: index; translation: widget.text.intro *}

{include 'cms/helper/text'}

<div class="grid block block--intro">
    <div class="grid__item grid--bp-med__10">
        <div class="text text--lead block {$app.cms.properties->getWidgetProperty('style.container')}" id="widget-{$app.cms.widget}">
            {call renderTextSimple titleClass="heading--border"}
        </div>
    </div>
</div>
