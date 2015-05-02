{include file="base/form.prototype"}
<a name="session"></a>

<form id="{$form->getId()}" class="form" action="{$app.url.request}" method="POST" role="form" data-parsley-validate>
    <div class="form__group">
        <div class="grid">
            <div class="grid__12 grid--bp-med__8 grid--bp-med__offset-2">
                <h2>{translate key="title.gin.suggestion"} {$ginTitle}</h2>

                {if $knownVisitor}
                    <div class="form__item">
                        <strong>{'label.name'|translate}</strong>: {$knownVisitor->name} <br>
                        <strong>{'label.email'|translate}</strong>: {$knownVisitor->email}<br>
                        <a href="#" id="toggle-known-visitor" data-target=".known-visitor"><small>{'button.not.you'|translate}</small></a>
                    </div>
                    <div class="superhidden known-visitor">
                        {call formRow form=$form row='name'}
                        {call formRow form=$form row='email'}
                    </div>
                {/if}
                {call formRows form=$form}

                <div class="form__actions">
                    <button type="submit" class="btn btn--primary"><span>{translate key="button.suggest.mix"}</span></button>
                </div>
            </div>
        </div>

    </div>
</form>
