<?php
/* Smarty version 4.3.1, created on 2023-06-19 17:05:58
  from 'C:\xampp\htdocs\TPEWEB\Biblioteca_Virtual\templates\author.list2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64906ed63c4285_67281309',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8745e579068b28bf7453966c68a0638a4c1b39e0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWEB\\Biblioteca_Virtual\\templates\\author.list2.tpl',
      1 => 1687187156,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_64906ed63c4285_67281309 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="caja_autores row justify-content-center">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['authors']->value, 'author');
$_smarty_tpl->tpl_vars['author']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['author']->value) {
$_smarty_tpl->tpl_vars['author']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['author']->value->id != 0) {?>
            <div class="caja_autor mx-auto col-4 col-md-4 col-lg-4">
                <div class="img_autor2">
                <img class="img_autor" src="<?php echo $_smarty_tpl->tpl_vars['author']->value->img_autor;?>
"></img>
                </div>
                <div class="caja_descripcion">
                    <h4 class="titulo_tarjeta">
                        <?php if ($_smarty_tpl->tpl_vars['author']->value->img_autor != null) {?>
                            <a href='author/id/<?php echo $_smarty_tpl->tpl_vars['author']->value->id;?>
'><?php echo $_smarty_tpl->tpl_vars['author']->value->nombre;?>
</a>
                        <?php } else { ?>
                            <?php echo $_smarty_tpl->tpl_vars['author']->value->nombre;?>

                        <?php }?>
                    </h4>
                    <p><?php echo $_smarty_tpl->tpl_vars['author']->value->fecha_nac;?>
 - (<?php echo $_smarty_tpl->tpl_vars['author']->value->nacionalidad;?>
)</p>
                </div>

                
                <?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
                    <div class="caja_btns">
                        <a class="btn btn-warning btn-sm row custom_btn" href="author/delete/<?php echo $_smarty_tpl->tpl_vars['author']->value->id;?>
" role="button">Borrar</a>
                        <a class="btn btn-danger btn-sm row custom_btn" href="author/edit/<?php echo $_smarty_tpl->tpl_vars['author']->value->id;?>
" role="button">Editar</a>
                    </div>
                <?php }?>
            </div>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
