<?php
/* Smarty version 4.3.1, created on 2023-06-12 21:58:06
  from 'C:\xampp\htdocs\TPEWEB\Biblioteca_Virtual\templates\edit.author.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_648778ce6aeac1_44487804',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '49f596602d4fb8c937faeafa46b678ebdd90bf4c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWEB\\Biblioteca_Virtual\\templates\\edit.author.tpl',
      1 => 1686599337,
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
function content_648778ce6aeac1_44487804 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="mt-5">

<div class="caja_autores justify-content-md-start mb-3">
    <div class="caja_autor row">
        <div class="caja_descripcion row col">
            <h4 class="titulo_tarjeta">
                <?php if ($_smarty_tpl->tpl_vars['author']->value->img_autor != null) {?>
                    <a><?php echo $_smarty_tpl->tpl_vars['author']->value->nombre;?>
</a>
                <?php } else { ?>
                    <?php echo $_smarty_tpl->tpl_vars['author']->value->nombre;?>

                <?php }?>
            </h4>
            <p><?php echo $_smarty_tpl->tpl_vars['author']->value->fecha_nac;?>
 - ( <?php echo $_smarty_tpl->tpl_vars['author']->value->nacionalidad;?>
)</p>
        </div>
        <img class="img_autor col" src="<?php echo $_smarty_tpl->tpl_vars['author']->value->img_autor;?>
"></img>
    </div>
</div>

<form action="author/editAttempt/<?php echo $_smarty_tpl->tpl_vars['author']->value->id;?>
" method="POST">    
    <div class="form-outline mb-4">
        <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['author']->value->nombre;?>
" name="name" id="form2Example1" class="form-control" required />
        <label class="form-label" for="form2Example1">Nombre Autor</label>
    </div>
    <div class="form-outline mb-4">
        <input type="text" value="<?php echo $_smarty_tpl->tpl_vars['author']->value->img_autor;?>
" name="img" id="form2Example1" class="form-control" required/>
        <label class="form-label" for="form2Example1">Link Imagen Autor</label>
    </div>    
    <?php $_smarty_tpl->_subTemplateRender("file:nationality.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="form-outline mb-4">
        <input type="date" value="<?php echo $_smarty_tpl->tpl_vars['author']->value->fecha_nac;?>
" name="date" id="form2Example2" class="form-control" required/>
        <label class="form-label" for="form2Example2">Fecha de Nacimiento</label>
    </div>     
     <button type="submit" class="btn btn-primary btn-block mb-4">Editar Autor</button>
    </form>
</div> 

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
