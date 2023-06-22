{include file="header.tpl"}

<div class="justify-content-center row">
    {foreach from=$authors item=$author}
        {if $author->id!=0}
            <div class="caja_autor col-3">
                <img class="img_autor" src="{$author->img_autor}"></img>
                <h5 class="titulo_tarjeta">
                    {if $author->img_autor!=null}
                        <a href='author/id/{$author->id}'>{$author->nombre}</a>
                    {else}
                        {$author->nombre}
                    {/if}
                </h5>
                <p class="text-center">{$author->fecha_nac} - ({$author->nacionalidad})</p>

                {if $logged}
                    <div class="caja_btns">
                        <a id="{$author->id}" class="eliminar autor btn btn-danger btn-sm row custom_btn" role="button">Borrar</a>
                        <a class="btn btn-warning btn-sm row custom_btn" href="author/edit/{$author->id}" role="button">Editar</a>
                    </div>
                {/if}
            </div>
        {/if}
    {/foreach}
</div>

{if $logged}
    <div id="modal" class="modal">
        <div class="modal-content">
            <p id="mensaje_borrar">¿Estás seguro de que deseas eliminar el autor?</p>
            <a id="aceptar" role="button" class="btn btn-success" href="">Aceptar</a>
            <a role="button" class="cancelar btn btn-primary">Cancelar</a>
        </div>
    </div>
    <script src="./js/script.js"></script>
{/if}
{include file="footer.tpl"}