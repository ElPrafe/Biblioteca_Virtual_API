{include file="header.tpl"}

<div class="author_details d-inline-flex mt-5">
    <div class="col-md-8 formulario">
        <form action="author/editAttempt/{$author->id}" method="POST">
            <fieldset>
                <legend class="text-left header2">Editar autor</legend>
                <span class="form-group d-flex align-items-center"><i class="fa fa-user-tie bigicon"></i>
                    <input id="form2Example1" name="name" value="{$author->nombre}" type="text"
                        placeholder="Nombre del autor" class="form-control" required>
                </span>

                <span class="form-group d-flex align-items-center"><i class="fa fa-image bigicon"></i>
                    <input id="form2Example1" name="img" value="{$author->img_autor}" type="text"
                        placeholder="URL imagen de autor" class="form-control">
                </span>

                <span class="form-group d-flex align-items-center"><i class="fa fa-calendar-days bigicon"></i>
                    <input id="form2Example2" name="date" value="{$author->fecha_nac}" type="date"
                        placeholder="Fecha de nacimiento" class="form-control" required>
                </span>


                <span class="form-group d-flex align-items-center"><i class="fa fa-image bigicon"></i>
                    {include file ="nationality.tpl"}
                </span>

                <button type="submit" class="btn btn-primary submit">Editar Autor</button>
            </fieldset>
        </form>
    </div>


    <div class="caja_autor_detail col d-flex">
        <div class="caja_descripcion_detail">
            <h4 class="titulo_tarjeta">
                {if $author->img_autor!=null}
                    <a>{$author->nombre}</a>
                {else}
                    {$author->nombre}
                {/if}
            </h4>
            <p class="text-center mb-1">{$author->fecha_nac}</p>
            <p class="text-center  mb-1">({$author->nacionalidad})</p>
        </div>
        <img class="img_autor_detail" src="{$author->img_autor}"></img>
    </div>
</div>

{include file="footer.tpl"}