{* widget: text; action: index; translation: widget.text.clickable *}

{include 'cms/helper/text'}

{foreach $callToActions as $callToAction}
    <a href="{$callToAction->getUrl()}"  class="text block text--clickable {if $subtitle}text--has-subtile{/if} {$app.cms.properties->getWidgetProperty('style.container')}" id="widget-{$app.cms.widget}">
        {$callToActions = null}
        {call renderTextSimple titleClass="heading--border" ctaClass="text__cta--arrow" callToActionsType='span'}
    </a>
{foreachelse}
    <div class="text block {if $subtitle}text--has-subtile{/if} {$app.cms.properties->getWidgetProperty('style.container')}" id="widget-{$app.cms.widget}">
        {call renderTextSimple titleClass="heading--border" ctaClass="text__cta--arrow" callToActionsType='span'}
    </div>
{/foreach}
