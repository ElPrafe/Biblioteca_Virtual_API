<?php
/* Smarty version 4.3.1, created on 2023-06-20 21:09:34
  from 'C:\xampp\htdocs\TPEWEB\Biblioteca_Virtual\templates\author.details.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6491f96e0ed291_29451471',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7101d2e5720e79608fdc1d3c87a04d4517e39458' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWEB\\Biblioteca_Virtual\\templates\\author.details.tpl',
      1 => 1687288169,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6491f96e0ed291_29451471 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="author_details d-inline-flex">
    <div class="row justify-content-center">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['books']->value, 'book');
$_smarty_tpl->tpl_vars['book']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['book']->value) {
$_smarty_tpl->tpl_vars['book']->do_else = false;
?>
            <div class="caja_libro col-3">
                <img class="img_libro col" src="<?php echo $_smarty_tpl->tpl_vars['book']->value->img_tapa;?>
"></img>
                <h6 class="titulo_tarjeta">
                    <a href='book/id/<?php echo $_smarty_tpl->tpl_vars['book']->value->id;?>
'><?php echo $_smarty_tpl->tpl_vars['book']->value->titulo;?>
</a>
                </h6>
                <p class="text-center"><?php echo $_smarty_tpl->tpl_vars['book']->value->genero;?>
</p>
                <?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
                    <div class="col caja_btns">
                        <a id="<?php echo $_smarty_tpl->tpl_vars['book']->value->id;?>
" class="eliminar libro btn btn-danger btn-sm row custom_btn" role="button">Borrar</a>
                        <a class="btn btn-warning btn-sm row custom_btn" href="book/edit/<?php echo $_smarty_tpl->tpl_vars['book']->value->id;?>
" role="button">Editar</a>
                    </div>
                <?php }?>
            </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
    <div>
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
        <?php if ($_smarty_tpl->tpl_vars['warning']->value) {?>
            <div class="error">El autor tiene libros cargados, primero elimine sus libros.</div>
        <?php }?>
    </div>
</div>

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
