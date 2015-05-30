<!doctype html>
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie10" lang="{$app.locale}"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9 lt-ie10" lang="{$app.locale}"> <![endif]-->
<!--[if IE 9]> <html class="no-js lt-ie10" lang="{$app.locale}"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="{$app.locale}"> <!--<![endif]-->
<head>
    {block "head"}
        {block "head_meta"}
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
        {/block}

        <title>{block "head_title"}{if isset($app.taskbar)}{$app.taskbar->getTitle()}{/if}{/block}</title>

        {block "styles"}
            {style src="wilma/css/main.min.css" media="screen"}
        {/block}

        {block "styles_app"}
            {if isset($app.styles)}
                {foreach $app.styles as $style => $dummy}
                    {if substr($style, 0, 7) == 'http://' || substr(style, 0, 8) == 'https://' || substr($style, 0, 2) == '//'}
                        {style src=$style media="screen"}
                    {else}
                        {style src="wilma/`$style`" media="screen"}
                    {/if}
                {/foreach}
            {/if}
        {/block}

        {styles}

        {block "favicon"}
            <link rel="icon" type="image/png" href="{$app.url.base}/img/favicon.png" />
        {/block}

        {block "scripts_head"}
            <script type="text/javascript" src="{$app.url.base}/wilma/js/modernizr.min.js"></script>
        {/block}
        {block "scripts_webfont"}{/block}
    {/block}
</head>

<body data-translation-url="{url id="api.locales.translations.exposed" parameters=["locale" => $app.locale]}" {block "body_attributes"}{/block}>
    {block "body"}

        {block "taskbar"}
            {if isset($app.taskbar)}
                {include "base/taskbar" title=$app.taskbar->getTitle() applicationsMenu=$app.taskbar->getApplicationsMenu() settingsMenu=$app.taskbar->getSettingsMenu()}
            {/if}
        {/block}

        {block "content"}
            {block "content_title"}{/block}
            {block "content_body"}{/block}
            {block "messages"}
                {if isset($app.messages)}
                    {$_messageTypes = ["error" => "danger", "warning" => "warning", "success" => "success", "information" => "info"]}
                    {foreach $_messageTypes as $_messageType => $_messageClass}
                        {$_messages = $app.messages->getByType($_messageType)}
                        {if $_messages}
                            <div class="notice notice--{$_messageClass}" role="alert">
                                <button type="button" class="btn btn--close" data-dismiss="alert">
                                    <span aria-hidden="true">×</span><span class="visuallyhidden">Close</span>
                                </button>
                                <div class="container">
                                    {if $_messages|count == 1}
                                        {$_message = $_messages|array_pop}
                                        <p>{$_message->getMessage()}</p>
                                    {else}
                                        <ul>
                                        {foreach $_messages as $_message}
                                            <li>{$_message->getMessage()}</li>
                                        {/foreach}
                                        </ul>
                                    {/if}
                                </div>
                            </div>
                        {/if}
                    {/foreach}
                {/if}
            {/block}
        {/block}

        {block "scripts"}
            {script src="wilma/js/jquery-2.1.4.min.js"}
            {script src="wilma/js/main.min.js"}
        {/block}

        {block "scripts_app"}
            {if isset($app.javascripts)}
                {foreach $app.javascripts as $script => $dummy}
                    {if substr($script, 0, 7) == 'http://' || substr(script, 0, 8) == 'https://' || substr($script, 0, 2) == '//' || substr($script, 0, 7) == '<script'}
                        {script src=$script}
                    {else}
                        {script src="wilma/`$script`"}
                    {/if}
                {/foreach}
            {/if}
        {/block}

        {scripts}

        {block "scripts_polyfills"}{/block}

        {block "scripts_inline"}
            {if isset($app.inlineJavascripts)}
                <script type="text/javascript">
                    $(function() {
                    {foreach $app.inlineJavascripts as $inlineJavascript}
                        {$inlineJavascript}
                    {/foreach}
                    });
                </script>
            {/if}
        {/block}
    {/block}
</body>
</html>
