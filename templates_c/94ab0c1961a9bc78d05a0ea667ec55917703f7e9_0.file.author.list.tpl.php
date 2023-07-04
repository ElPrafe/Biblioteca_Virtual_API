<?php
/* Smarty version 4.3.1, created on 2023-06-20 17:32:25
  from 'C:\xampp\htdocs\TPEWEB\Biblioteca_Virtual\templates\author.list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6491c689f26fc9_77573774',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94ab0c1961a9bc78d05a0ea667ec55917703f7e9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWEB\\Biblioteca_Virtual\\templates\\author.list.tpl',
      1 => 1687275132,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6491c689f26fc9_77573774 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="justify-content-center row">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['authors']->value, 'author');
$_smarty_tpl->tpl_vars['author']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['author']->value) {
$_smarty_tpl->tpl_vars['author']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['author']->value->id != 0) {?>
            <div class="caja_autor col-3">
                <img class="img_autor" src="<?php echo $_smarty_tpl->tpl_vars['author']->value->img_autor;?>
"></img>
                <h5 class="titulo_tarjeta">
                    <?php if ($_smarty_tpl->tpl_vars['author']->value->img_autor != null) {?>
                        <a href='author/id/<?php echo $_smarty_tpl->tpl_vars['author']->value->id;?>
'><?php echo $_smarty_tpl->tpl_vars['author']->value->nombre;?>
</a>
                    <?php } else { ?>
                        <?php echo $_smarty_tpl->tpl_vars['author']->value->nombre;?>

                    <?php }?>
                </h5>
                <p class="text-center"><?php echo $_smarty_tpl->tpl_vars['author']->value->fecha_nac;?>
 - (<?php echo $_smarty_tpl->tpl_vars['author']->value->nacionalidad;?>
)</p>

                <?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
                    <div class="caja_btns">
                        <a id="<?php echo $_smarty_tpl->tpl_vars['author']->value->id;?>
" class="eliminar autor btn btn-danger btn-sm row custom_btn" role="button">Borrar</a>
                        <a class="btn btn-warning btn-sm row custom_btn" href="author/edit/<?php echo $_smarty_tpl->tpl_vars['author']->value->id;?>
" role="button">Editar</a>
                    </div>
                <?php }?>
            </div>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>

<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
    <div id="modal" class="modal">
        <div class="modal-content">
            <p id="mensaje_borrar">¿Estás seguro de que deseas eliminar el autor?</p>
            <a id="aceptar" role="button" class="btn btn-success" href="">Aceptar</a>
            <a role="button" class="cancelar btn btn-primary">Cancelar</a>
        </div>
    </div>
    <?php echo '<script'; ?>
 src="./js/script.js"><?php echo '</script'; ?>
>
<?php }
$_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
