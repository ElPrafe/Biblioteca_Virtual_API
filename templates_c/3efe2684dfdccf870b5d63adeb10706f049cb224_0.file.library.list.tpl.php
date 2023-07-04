<?php
/* Smarty version 4.3.1, created on 2023-05-29 21:40:34
  from 'C:\xampp\htdocs\TPEWEB\templates\library.list.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6474ffb2e1b255_79237919',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3efe2684dfdccf870b5d63adeb10706f049cb224' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWEB\\templates\\library.list.tpl',
      1 => 1685389090,
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
function content_6474ffb2e1b255_79237919 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:form_alta.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<ul>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['authors']->value, 'author');
$_smarty_tpl->tpl_vars['author']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['author']->value) {
$_smarty_tpl->tpl_vars['author']->do_else = false;
?>        
            <span> <b><?php echo $_smarty_tpl->tpl_vars['author']->value->nombre;?>
</b> - <img src='<?php echo $_smarty_tpl->tpl_vars['author']->value->img_autor;?>
'> -<?php echo $_smarty_tpl->tpl_vars['author']->value->fecha_nac;?>
 ( <?php echo $_smarty_tpl->tpl_vars['author']->value->nacionalidad;?>
) </span>
        </li>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</ul>


<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
