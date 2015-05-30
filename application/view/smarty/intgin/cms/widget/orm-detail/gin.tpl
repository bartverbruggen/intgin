<div class="detail block {$app.cms.properties->getWidgetProperty('style.container')}" id="widget-{$app.cms.widget}">
    <div class="content clearfix">
        {if $content->image}
        <div class="block__image">
            <img src="{image src=$content->image width=1200 height=600 transformation="crop"}" class="image image--responsive" />
        </div>
        {/if}
        {if !$properties->getTitle()}
            <h1 class="block__title {$app.cms.properties->getWidgetProperty('style.title')}">{$content->title}</h1>
        {/if}
        <div class="block__ct">{$content->teaser}</div>
    </div>
</div>

{if $content->data->getMixes}
    <div class="block">
        <h2>{'label.perfect.serves'|translate}</h2>
        {foreach $content->data->getMixes as $mix}
            <div class="grid grid--bp-med-2-col">
                {if $mix->getTonic()}
                    <div class="grid__item">
                        <div class="block text--center">
                            {$tonic = $mix->getTonic()}
                            <div class="block__header">
                                <div class="block__title">
                                    <h3>{$tonic->title}</h3>
                                </div>
                            </div>
                            <div class="block__img">
                                {if $tonic->image->getValue()}
                                    <img src="{image src=$tonic->image->getValue() width=600 height=600 transformation="crop"}" class="image image--responsive" />
                                {/if}
                            </div>
                        </div>
                    </div>
                {/if}
                {if $mix->getGarnish()}
                    <div class="grid__item">
                        {foreach $mix->getGarnish() as $garnish}
                            <div class="block text--center">
                                <div class="block__header">
                                    <div class="block__title">
                                        <h3>{$garnish->title}</h3>
                                    </div>
                                </div>
                                <div class="block__img">
                                    {if $garnish->image}
                                        <img src="{image src=$garnish->image->getValue() width=600 height=600 transformation="crop"}" class="image image--responsive" />
                                    {/if}
                                </div>
                            </div>
                        {/foreach}
                    </div>
                {/if}
            </div>
        {/foreach}
    </div>
{/if}
