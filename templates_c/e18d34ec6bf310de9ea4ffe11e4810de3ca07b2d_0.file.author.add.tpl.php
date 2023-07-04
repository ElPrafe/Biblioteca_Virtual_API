<?php
/* Smarty version 4.3.1, created on 2023-06-20 21:32:46
  from 'C:\xampp\htdocs\TPEWEB\Biblioteca_Virtual\templates\author.add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6491fede461cc9_17655185',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e18d34ec6bf310de9ea4ffe11e4810de3ca07b2d' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWEB\\Biblioteca_Virtual\\templates\\author.add.tpl',
      1 => 1687289465,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:nationality.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6491fede461cc9_17655185 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
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
                <?php $_smarty_tpl->_subTemplateRender("file:nationality.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </span>

            <button type="submit" class="btn btn-primary submit">Agregar Autor</button>
        </fieldset>
    </form>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
