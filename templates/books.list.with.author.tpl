{include file="header.tpl"}

<div class="row justify-content-center">
    {foreach from=$books item=$book}
        <div class="caja_libro col-3">
            <img class="img_libro col" src="{$book['img_tapa']}"></img>
            <h6 class="titulo_tarjeta">
                <a href='book/id/{$book['id']}'>{$book['titulo']} - {$book['autor_nombre']}</a>
            </h6>
            <p>{$book['genero']}</p>
            {if $logged}
                <div class="col caja_btns">
                    <a id="{$book['id']}" class="eliminar libro btn btn-danger btn-sm row custom_btn" role="button">Borrar</a>
                    <a class="btn btn-warning btn-sm row custom_btn" href="book/edit/{$book['id']}" role="button">Editar</a>
                </div>
            {/if}
        </div>
    {/foreach}
</div>
{if $logged}
    <div id="modal" class="modal">
        <div class="modal-content">
            <p id="mensaje_borrar">¿Estás seguro de que deseas eliminar el Libro?</p>
            <a id="aceptar" role="button" class="btn btn-success" href="">Aceptar</a>
            <a role="button" class="cancelar btn btn-primary">Cancelar</a>
        </div>
    </div>
    <script src="./js/script.js"></script>
{/if}
{include file="footer.tpl"}