{* widget: text; action: index; translation: widget.text.ctablock *}

<div class="widget widget-text text block block--feature {$app.cms.properties->getWidgetProperty('style.container')}" id="widget-{$app.cms.widget}">
    {foreach $callToActions as $callToAction}
        <a href="{$callToAction->getUrl()}">
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
                <img src="{image src=$image width=150 height=150 transformation="crop"}" class="{$imageClass}" />
            {/if}
            <div class="block__ct">
                <div class="grid grid--flex-vertical">
                    <div class="grid__12 grid--bp-sml__8">
                        <div class="block__main">
                            <div class="block__header">
                                {if $title}
                                    {$title = $title|text}
                                    <h2 class="{$app.cms.properties->getWidgetProperty('style.title')}" id="{$title|safe}">{$title}</h2>
                                {/if}
                                {if $subtitle}
                                    {$subtitle = $subtitle|text}
                                    <h3 class="{$app.cms.properties->getWidgetProperty('style.subtitle')}" id="{$subtitle|safe}">{$subtitle}</h3>
                                {/if}
                            </div>
                            {$html|text}
                        </div>
                    </div>
                    {*<div class="grid__12 grid--bp-sml__4">
                        <div class="block__aside">
                            <span class="text__cta btn btn--ghost-inv btn--lrg btn--arrow{if $callToAction->getType()} cta-{$callToAction->getType()}{/if} {$app.cms.properties->getWidgetProperty('style.cta')}">{$callToAction->getLabel()|text}</span>
                        </div>
                    </div>*}
                </div>
            </div>
        </a>
    {/foreach}
</div>
