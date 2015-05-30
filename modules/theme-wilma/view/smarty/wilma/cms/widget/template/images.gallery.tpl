{* widget: template; action: index; translation: widget.template.images.gallery *}

{include 'cms/helper/assets'}

{$data = $app.cms.context.content->data}

{if isset($data->thumbnails) && $data->getThumbnails()}
    {call renderAssets assets=$data->getThumbnails()}
{/if}
