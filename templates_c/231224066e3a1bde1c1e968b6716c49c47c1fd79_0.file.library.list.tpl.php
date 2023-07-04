<?php
/* Smarty version 4.3.1, created on 2023-05-30 00:51:56
  from 'C:\xampp\htdocs\TPEWEB\Biblioteca_Virtual\templates\library.list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_64752c8c2bed01_91447556',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '231224066e3a1bde1c1e968b6716c49c47c1fd79' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWEB\\Biblioteca_Virtual\\templates\\library.list.tpl',
      1 => 1685393101,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:form_alta.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_64752c8c2bed01_91447556 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:form_alta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<div class="row justify-content-md-center">
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['authors']->value, 'author');
$_smarty_tpl->tpl_vars['author']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['author']->value) {
$_smarty_tpl->tpl_vars['author']->do_else = false;
?>
    <div class="col col-lg-4">
    <span> <?php echo $_smarty_tpl->tpl_vars['author']->value->nombre;?>
 - <img src='<?php echo $_smarty_tpl->tpl_vars['author']->value->img_autor;?>
'class="img-fluid "> -<?php echo $_smarty_tpl->tpl_vars['author']->value->fecha_nac;?>
 ( <?php echo $_smarty_tpl->tpl_vars['author']->value->nacionalidad;?>
) </span>
    </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</div>




<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
