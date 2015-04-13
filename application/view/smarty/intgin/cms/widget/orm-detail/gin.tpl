<div class="detail widget widget-content-detail block {$app.cms.properties->getWidgetProperty('style.container')}" id="widget-{$app.cms.widget}">
    <div class="content clearfix">
        {if $content->image}
        <div class="block__image">
            <img src="{image src=$content->image width=125 height=125 transformation="resize"}" />
        </div>
        {/if}
        {if !$properties->getTitle()}
            <h1 class="block__title {$app.cms.properties->getWidgetProperty('style.title')}">{$content->title}</h1>
        {/if}
        <div class="block__ct">{$content->teaser}</div>
    </div>
</div>
