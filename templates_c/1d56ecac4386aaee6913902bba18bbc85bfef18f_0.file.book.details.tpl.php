<?php
/* Smarty version 4.3.1, created on 2023-06-20 00:34:54
  from 'C:\xampp\htdocs\TPEWEB\Biblioteca_Virtual\templates\book.details.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6490d80e77d247_76103250',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d56ecac4386aaee6913902bba18bbc85bfef18f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWEB\\Biblioteca_Virtual\\templates\\book.details.tpl',
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
function content_6490d80e77d247_76103250 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="d-flex justify-content-center ">
    <div class="caja_autor">
        <div class="titulo_autor">
            <h1 class="titulo_autor"><?php echo $_smarty_tpl->tpl_vars['author']->value->nombre;?>
</h1>
        </div>
        <div class="caja_descripcion row  d-flex justify-content-center">
            <h4 class="titulo_tarjeta">
                <a><?php echo $_smarty_tpl->tpl_vars['book']->value->titulo;?>
</a>
            </h4>
            <img class="img_libro_detail col" src="<?php echo $_smarty_tpl->tpl_vars['book']->value->img_tapa;?>
"></img>
            <h6 class="text-center"><?php echo $_smarty_tpl->tpl_vars['book']->value->genero;?>
</h6>
            <p class="text-justify"><?php echo $_smarty_tpl->tpl_vars['book']->value->descripcion;?>
</p>
        </div>
    </div>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
