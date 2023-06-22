{include file="header.tpl"}
<div class="col-md-8 formulario_add">
    <form action="author/addAttempt" method="POST">
        <fieldset>
            <legend class="text-left header2">Agregar autor</legend>
            <span class="form-group d-flex align-items-center"><i class="fa fa-user-tie bigicon"></i>
                <input id="form2Example1" name="name" type="text" placeholder="Nombre del autor" class="form-control"
                    required>
            </span>

            <span class="form-group d-flex align-items-center"><i class="fa fa-image bigicon"></i>
                <input id="form2Example1" name="img" type="text" placeholder="URL imagen de autor" class="form-control">
            </span>

            <span class="form-group d-flex align-items-center"><i class="fa fa-calendar-days bigicon"></i>
                <input id="form2Example2" name="date" type="date" placeholder="Fecha de nacimiento"
                    class="form-control" required>
            </span>

            <span class="form-group d-flex align-items-center"><i class="fa fa-image bigicon"></i>
                {include file ="nationality.tpl"}
            </span>

            <button type="submit" class="btn btn-primary submit">Agregar Autor</button>
        </fieldset>
    </form>
</div>

{include file="footer.tpl"}