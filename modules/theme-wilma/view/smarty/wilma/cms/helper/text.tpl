{function renderTitles}
    {if $title}
        {$title = $title|text}
        <h2 class="toc text__title {if isset($titleClass)}{$titleClass}{/if} {$app.cms.properties->getWidgetProperty('style.title')}" id="{$title|safe}">{$title}</h2>
    {/if}
    {if $subtitle}
        {$subtitle = $subtitle|text}
        <h3 class="toc text__title {$app.cms.properties->getWidgetProperty('style.subtitle')}" id="{$subtitle|safe}">{$subtitle}</h3>
    {/if}
{/function}

{function name="renderTextSimple" titleClass=null subtitleClass=null callToActionsType='link' ctaClass=null}
    <div class="text__inner excerpt clearfix">

        {if $image}
            <div class="excerpt__aside">
                <div class="excerpt__image">
                    <img src="{image src=$image width=140 height=140 transformation="resize"}" class="image image--full-width" />
                </div>
            </div>
        {/if}

        <div class="excerpt__main">
            {call renderTitles title=$title subtitle=$subtitle}

            <div class="excerpt__ct">
                {$html|text}
            </div>
            {foreach $callToActions as $callToAction}
                {if callToActionsType != 'link'}
                    <span class="text__cta {if $ctaClass}{$ctaClass}{/if} {if $callToAction->getType()} cta-{$callToAction->getType()}{/if} {$app.cms.properties->getWidgetProperty('style.cta')}">{$callToAction->getLabel()|text}</span>
                {else}
                    <a href="{$callToAction->getUrl()}" class="text__cta {if $ctaClass}{$ctaClass}{/if} {if $callToAction->getType()} cta-{$callToAction->getType()}{/if} {$app.cms.properties->getWidgetProperty('style.cta')}">{$callToAction->getLabel()|text}</a>
                {/if}
            {/foreach}
        </div>
    </div>
{/function}

{function name="renderText" titleClass=null subtitleClass=null callToActionsType='link' ctaClass=null}
    <div class="text__inner clearfix">

        {call renderTitles title=$title subtitle=$subtitle titleClass=$titleClass subtitleClass=$subtitleClass}

        {if $image}
            {$imageClass = 'image'}
            {if $imageAlignment == 'left'}
                {$imageClass = "`$imageClass` image--responsive image--left"}
            {elseif $imageAlignment == 'right'}
                {$imageClass = "`$imageClass` image--responsive image--right"}
            {elseif $imageAlignment == 'justify'}
                {$imageClass = "`$imageClass` image--full-width"}
            {else}
                {$imageClass = "`$imageClass` image--responsive"}
            {/if}

            {if $html}
                <img src="{image src=$image width=300 height=300 transformation="resize"}" class="{$imageClass}" />
                {$html|text}
                {foreach $callToActions as $callToAction}
                    <a href="{$callToAction->getUrl()}" class="cta{if $callToAction->getType()} cta-{$callToAction->getType()}{/if} {$app.cms.properties->getWidgetProperty('style.cta')}">{$callToAction->getLabel()|text}</a>
                {/foreach}
            {else}
                <img src="{image src=$image width=300 height=300 transformation="resize"}" class="{$imageClass}" />
                {foreach $callToActions as $callToAction}
                    <a href="{$callToAction->getUrl()}" class="cta{if $callToAction->getType()} cta-{$callToAction->getType()}{/if} {$app.cms.properties->getWidgetProperty('style.cta')}">{$callToAction->getLabel()|text}</a>
                {/foreach}
            {/if}
        {else}
            {$html|text}
            {foreach $callToActions as $callToAction}
                <a href="{$callToAction->getUrl()}" class="text__cta cta{if $callToAction->getType()} cta-{$callToAction->getType()}{/if} {$app.cms.properties->getWidgetProperty('style.cta')}">{$callToAction->getLabel()|text}</a>
            {/foreach}
        {/if}
    </div>
{/function}
