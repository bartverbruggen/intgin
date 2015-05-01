{$bodyComponent = $app.cms.node->get('body.components')}
{$app.cms.node->set('body.components', "`$bodyComponent` form")}

<div class="widget widget-search-form widget-search-form-content {$app.cms.properties->getWidgetProperty('style.container')}" id="widget-{$app.cms.widget}">
    <form id="cse-search-box" action="{$action}" role="search" class="form--inline" method="post">
        <div class="form__item">
            <label class="visuallyhidden" for="form-search-query">{translate key="label.query.search"}</label>
            <input type="search" id="form-search-gin" name="query" class="form__text" data-source="{url id="api.search.gin" parameters=['locale' => $app.locale]}"  />
        </div>
        <button type="submit" class="btn btn--primary" name="sa">{translate key="button.search"}</button>
    </form>
</div>
