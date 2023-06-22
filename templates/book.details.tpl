{include file="header.tpl"}

<div class="d-flex justify-content-center ">
    <div class="caja_autor">
        <div class="titulo_autor">
            <h1 class="titulo_autor">{$author->nombre}</h1>
        </div>
        <div class="caja_descripcion row  d-flex justify-content-center">
            <h4 class="titulo_tarjeta">
                <a>{$book->titulo}</a>
            </h4>
            <img class="img_libro_detail col" src="{$book->img_tapa}"></img>
            <h6 class="text-center">{$book->genero}</h6>
            <p class="text-justify">{$book->descripcion}</p>
        </div>
    </div>
</div>

{include file="footer.tpl"}