{include file="header.tpl"}
<!-- formulario de alta de tarea -->
<div class="col-md-4 border login_form">
    <form action="loginAttempt" method="POST">
        <fieldset>
            <legend class="text-left header2">Ingresar</legend>
            <span class="form-group d-flex align-items-center"><i class="fa fa-user bigicon"></i>
                <input id="form2Example1" name="username" type="text" placeholder="Usuario" class="form-control"
                    required>
            </span>

            <span class="form-group d-flex align-items-center"><i class="fa fa-key bigicon"></i>
                <input id="form2Example2" name="password" type="password" placeholder="Password" class="form-control" required>
            </span>
            <button type="submit" class="btn btn-primary submit">Ingresar</button>
        </fieldset>
    </form>
</div>

{include file="footer.tpl"}