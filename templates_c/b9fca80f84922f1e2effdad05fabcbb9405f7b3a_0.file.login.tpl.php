<?php
/* Smarty version 4.3.1, created on 2023-06-20 00:33:01
  from 'C:\xampp\htdocs\TPEWEB\Biblioteca_Virtual\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6490d79d5be242_08539601',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b9fca80f84922f1e2effdad05fabcbb9405f7b3a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWEB\\Biblioteca_Virtual\\templates\\login.tpl',
      1 => 1687213831,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6490d79d5be242_08539601 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
