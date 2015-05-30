{*
    Renders the items of a menu
*}
{function name="renderMenu" items=null prefix=null number=null depth=null class=null}
    {assign var="prefix" value="`$prefix``$number`"}

    <ul class="{$prefix} {$class}">
    {foreach $items as $node}
        {if !$node->hideInMenu() && $node->isPublished() && $nodeTypes[$node->getType()]->getFrontendCallback() && $node->isAvailableInLocale($app.locale) && $node->isAllowed($app.user)}

        {if $app.cms.node->getId() == $node->getId() && !$app.cms.node->hasParent($node->getId())}
            {$active = true}
        {else}
            {$active = false}
        {/if}
        {if $node->getType() == 'redirect'}
            {if $node->getRedirectNode($app.locale) == $app.cms.node->getId() || $app.cms.node->getId() == $node->getId()}
                {$active = true}
            {/if}
        {/if}

        <li class="{if $node@first}first {/if}{cycle values="even,odd" name=$prefix}{if $app.cms.node->hasParent($node->getId()) || $active} active{/if}{if $node@last} last{/if}">
            <a href="{$app.url.script}{$node->getRoute($app.locale)}" class="nav__link nav__link--{$node->getId()|replace:'.':'-'}{if $app.cms.node->hasParent($node->getId()) || $active} active{/if}">{$node->getName($app.locale, "menu")}</a>
            {if $node->getChildren() && $depth > 1 && ($app.cms.node->hasParent($node->getId()) || $active)}
                {call renderMenu items=$node->getChildren() prefix="`$prefix`sub" number=$number depth=$depth-1}

                {assign var="number" value=$number+1}
            {/if}
        </li>
        {/if}
    {/foreach}
    </ul>
{/function}

<nav class="nav {if isset($menuClass)}{$menuClass}{/if} {$app.cms.properties->getWidgetProperty('style.container')}" id="widget-{$app.cms.widget}" role="navigation">
    {if $title}
        <h2 class="{$app.cms.properties->getWidgetProperty('style.title')}{if isset($titleClass)} {$titleClass}{/if}">{$title}</h2>
    {/if}

    {call renderMenu prefix="menu" items=$items number=1 depth=$depth class=$app.cms.properties->getWidgetProperty('style.menu')}
</nav>
