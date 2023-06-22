{include file="header.tpl"}
<div class="author_details d-inline-flex mt-5">
    <div class="col-md-8 formulario">
        <form action="book/editAttempt/{$book->id}" method="POST">
            <fieldset>
                <legend class="text-left header2">Editar libro</legend>
                <span class="form-group d-flex align-items-center"><i class="fa fa-book bigicon"></i>
                    <input id="form2Example1" name="title" value="{$book->titulo}" type="text"
                        placeholder="Título del libro" class="form-control" required>
                </span>

                <span class="form-group d-flex align-items-center"><i class="fa fa-image bigicon"></i>
                    <input id="form2Example2" name="img" value="{$book->img_tapa}" type="text"
                        placeholder="URL imagen del libro" class="form-control">
                </span>

                <span class="form-group d-flex align-items-center"><i class="fa fa-quote-left bigicon"></i>
                    <input id="form2Example1" name="genre" value="{$book->genero}" type="text"
                        placeholder="Género/s del libro" class="form-control" required>
                </span>

                <span class="form-group d-flex align-items-center"><i class="fa fa-feather bigicon"></i>
                    <textarea rows="7" id="descripcion_libro" name="desc" placeholder="Descripción del libro"
                        class="form-control">{$book->descripcion}</textarea>
                </span>
                <span class="form-group d-flex align-items-center"><i class="fa fa-user-tie bigicon"></i>
                    <select class="nacionality" name="author"
                        required>{* Esta logica es utilizada para mostrar seleccionado el autor del libro y despues mostrar el resto de autores *}
                        {foreach from=$authors item=$author}
                            {if ($author->id == $book->id_autor)}
                                <option value="{$author->id}">{$author->nombre}</option>
                            {/if}
                        {/foreach}
                        {foreach from=$authors item=$author}
                            {if ($author->id != $book->id_autor)}
                                <option value="{$author->id}">{$author->nombre}</option>
                            {/if}
                        {/foreach}
                    </select>
                </span>
                <button type="submit" class="btn btn-primary submit">Editar Libro</button>
            </fieldset>
        </form>
    </div>
    <div class="tarjeta_edit">
        <h1 class="titulo_libro_edit">{$author->nombre}</h1>
        <div class="caja_descripcion_libro_edit row d-flex justify-content-center">
            <h4 class="titulo_tarjeta">
                <a>{$book->titulo}</a>
            </h4>
            <img class="img_libro_edit col" src="{$book->img_tapa}"></img>
            <h6 class="text-center">{$book->genero}</h6>
            <p class="text-justify">{$book->descripcion}</p>
        </div>
    </div>
</div>

{include file="footer.tpl"}