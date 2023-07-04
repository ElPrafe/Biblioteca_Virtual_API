<?php
/* Smarty version 4.3.1, created on 2023-06-08 21:30:09
  from 'C:\xampp\htdocs\TPEWEB\Biblioteca_Virtual\templates\books.list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64822c41699387_82485860',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7d5515356fb6f6428ed2b5e2b791c058ffc8a3cb' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWEB\\Biblioteca_Virtual\\templates\\books.list.tpl',
      1 => 1686252601,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_64822c41699387_82485860 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="caja_autores justify-content-md-start">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['books']->value, 'book');
$_smarty_tpl->tpl_vars['book']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['book']->value) {
$_smarty_tpl->tpl_vars['book']->do_else = false;
?>
        <?php if ($_smarty_tpl->tpl_vars['book']->value->id != 0) {?>
            <div class="caja_autor row">
                <div class="caja_descripcion row col">
                    <h4 class="titulo_tarjeta">                        
                        <a href='book/id/<?php echo $_smarty_tpl->tpl_vars['book']->value->id;?>
'><?php echo $_smarty_tpl->tpl_vars['book']->value->titulo;?>
</a>                                               
                    </h4>
                    <h3><?php echo $_smarty_tpl->tpl_vars['book']->value->genero;?>
</h3>                    
                </div>
                    <img class="img_autor col" src="<?php echo $_smarty_tpl->tpl_vars['book']->value->img_tapa;?>
"></img>
            </div>
        <?php }?>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
