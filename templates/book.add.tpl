{include file="header.tpl"}
<div class="col-md-8 formulario_add">
    <form action="book/addAttempt" method="POST">
        <fieldset>
            <legend class="text-left header2">Editar libro</legend>
            <span class="form-group d-flex align-items-center"><i class="fa fa-book bigicon"></i>
                <input id="form2Example1" name="title" type="text" placeholder="Título del libro" class="form-control"
                    required>
            </span>

            <span class="form-group d-flex align-items-center"><i class="fa fa-image bigicon"></i>
                <input id="form2Example2" name="img" type="text" placeholder="URL imagen del libro"
                    class="form-control">
            </span>

            <span class="form-group d-flex align-items-center"><i class="fa fa-quote-left bigicon"></i>
                <input id="form2Example1" name="genre" type="text" placeholder="Género/s del libro" class="form-control"
                    required>
            </span>

            <span class="form-group d-flex align-items-center"><i class="fa fa-feather bigicon"></i>
                <textarea rows="7" id="descripcion_libro" name="desc" placeholder="Descripción del libro"
                    class="form-control"></textarea>
            </span>
            <span class="form-group d-flex align-items-center"><i class="fa fa-user-tie bigicon"></i>
                <select class="nacionality" name="author"
                    required>{* Esta logica es utilizada para mostrar seleccionado el autor del libro y despues mostrar el resto de autores *}
                    {foreach from=$authors item=$author}
                        <option value="{$author->id}">{$author->nombre}</option>
                    {/foreach}
                </select>
            </span>
            <button type="submit" class="btn btn-primary submit">Agregar Libro</button>
        </fieldset>
    </form>
</div>

{include file="footer.tpl"}