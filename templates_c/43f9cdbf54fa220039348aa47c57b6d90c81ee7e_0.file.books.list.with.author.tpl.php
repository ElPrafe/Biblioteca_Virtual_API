<?php
/* Smarty version 4.3.1, created on 2023-06-20 19:18:04
  from 'C:\xampp\htdocs\TPEWEB\Biblioteca_Virtual\templates\books.list.with.author.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6491df4c537640_31232590',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '43f9cdbf54fa220039348aa47c57b6d90c81ee7e' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWEB\\Biblioteca_Virtual\\templates\\books.list.with.author.tpl',
      1 => 1687281477,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6491df4c537640_31232590 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="row justify-content-center">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['books']->value, 'book');
$_smarty_tpl->tpl_vars['book']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['book']->value) {
$_smarty_tpl->tpl_vars['book']->do_else = false;
?>
        <div class="caja_libro col-3">
            <img class="img_libro col" src="<?php echo $_smarty_tpl->tpl_vars['book']->value['img_tapa'];?>
"></img>
            <h6 class="titulo_tarjeta">
                <a href='book/id/<?php echo $_smarty_tpl->tpl_vars['book']->value['id'];?>
'><?php echo $_smarty_tpl->tpl_vars['book']->value['titulo'];?>
 - <?php echo $_smarty_tpl->tpl_vars['book']->value['autor_nombre'];?>
</a>
            </h6>
            <p><?php echo $_smarty_tpl->tpl_vars['book']->value['genero'];?>
</p>
            <?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
                <div class="col caja_btns">
                    <a id="<?php echo $_smarty_tpl->tpl_vars['book']->value['id'];?>
" class="eliminar libro btn btn-danger btn-sm row custom_btn" role="button">Borrar</a>
                    <a class="btn btn-warning btn-sm row custom_btn" href="book/edit/<?php echo $_smarty_tpl->tpl_vars['book']->value['id'];?>
" role="button">Editar</a>
                </div>
            <?php }?>
        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>
<?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
    <div id="modal" class="modal">
        <div class="modal-content">
            <p id="mensaje_borrar">¿Estás seguro de que deseas eliminar el Libro?</p>
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
