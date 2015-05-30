<ul class="list--border{if isset($class)} $class{/if}">
    {foreach $files as $file}
        {$fileOptions = $app.system->getFileSystem()->getFile($file)}
        <li>
          <a href="{$file.url}" class="download">
            {$file.label}
             <span class="download__meta">({$fileOptions->getExtension()} {$fileOptions->getSize()|decorate:"storage.size"})</span>
          </a>
        </li>
    {/foreach}
</ul>