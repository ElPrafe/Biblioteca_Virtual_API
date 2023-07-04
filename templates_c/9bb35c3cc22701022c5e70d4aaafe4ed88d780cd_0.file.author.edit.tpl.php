<?php
/* Smarty version 4.3.1, created on 2023-06-20 22:11:02
  from 'C:\xampp\htdocs\TPEWEB\Biblioteca_Virtual\templates\author.edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_649207d60ab319_67695379',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9bb35c3cc22701022c5e70d4aaafe4ed88d780cd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWEB\\Biblioteca_Virtual\\templates\\author.edit.tpl',
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
function content_649207d60ab319_67695379 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="author_details d-inline-flex mt-5">
    <div class="col-md-8 formulario">
        <form action="author/editAttempt/<?php echo $_smarty_tpl->tpl_vars['author']->value->id;?>
" method="POST">
            <fieldset>
                <legend class="text-left header2">Editar autor</legend>
                <span class="form-group d-flex align-items-center"><i class="fa fa-user-tie bigicon"></i>
                    <input id="form2Example1" name="name" value="<?php echo $_smarty_tpl->tpl_vars['author']->value->nombre;?>
" type="text"
                        placeholder="Nombre del autor" class="form-control" required>
                </span>

                <span class="form-group d-flex align-items-center"><i class="fa fa-image bigicon"></i>
                    <input id="form2Example1" name="img" value="<?php echo $_smarty_tpl->tpl_vars['author']->value->img_autor;?>
" type="text"
                        placeholder="URL imagen de autor" class="form-control">
                </span>

                <span class="form-group d-flex align-items-center"><i class="fa fa-calendar-days bigicon"></i>
                    <input id="form2Example2" name="date" value="<?php echo $_smarty_tpl->tpl_vars['author']->value->fecha_nac;?>
" type="date"
                        placeholder="Fecha de nacimiento" class="form-control" required>
                </span>


                <span class="form-group d-flex align-items-center"><i class="fa fa-image bigicon"></i>
                    <?php $_smarty_tpl->_subTemplateRender("file:nationality.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                </span>

                <button type="submit" class="btn btn-primary submit">Editar Autor</button>
            </fieldset>
        </form>
    </div>


    <div class="caja_autor_detail col d-flex">
        <div class="caja_descripcion_detail">
            <h4 class="titulo_tarjeta">
                <?php if ($_smarty_tpl->tpl_vars['author']->value->img_autor != null) {?>
                    <a><?php echo $_smarty_tpl->tpl_vars['author']->value->nombre;?>
</a>
                <?php } else { ?>
                    <?php echo $_smarty_tpl->tpl_vars['author']->value->nombre;?>

                <?php }?>
            </h4>
            <p class="text-center mb-1"><?php echo $_smarty_tpl->tpl_vars['author']->value->fecha_nac;?>
</p>
            <p class="text-center  mb-1">(<?php echo $_smarty_tpl->tpl_vars['author']->value->nacionalidad;?>
)</p>
        </div>
        <img class="img_autor_detail" src="<?php echo $_smarty_tpl->tpl_vars['author']->value->img_autor;?>
"></img>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
