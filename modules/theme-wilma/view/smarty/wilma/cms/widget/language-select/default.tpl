{* widget: language.select; action: index; translation: widget.language.select.default *}

<nav class="nav nav--language {$app.cms.properties->getWidgetProperty('style.container')}" id="widget-{$app.cms.widget}">
    <ul class="locales {$app.cms.properties->getWidgetProperty('style.menu')}">
    {foreach $locales as $code => $data}
        {$locale = $data.locale}
        <li{if $code == $app.locale} class="active"{/if}><a href="{$data.url}">{$code}</a></li>
    {/foreach}
    </ul>
</nav>
