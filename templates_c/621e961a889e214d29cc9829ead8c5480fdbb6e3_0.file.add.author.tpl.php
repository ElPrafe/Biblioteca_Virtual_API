<?php
/* Smarty version 4.3.1, created on 2023-06-12 20:15:16
  from 'C:\xampp\htdocs\TPEWEB\Biblioteca_Virtual\templates\add.author.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_648760b41d8773_44907790',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '621e961a889e214d29cc9829ead8c5480fdbb6e3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWEB\\Biblioteca_Virtual\\templates\\add.author.tpl',
      1 => 1686589021,
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
function content_648760b41d8773_44907790 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="mt-5">
<form action="author/addAttempt" method="POST">    
    <div class="form-outline mb-4">
        <input type="text" name="name" id="form2Example1" class="form-control" required/>
        <label class="form-label" for="form2Example1">Nombre Autor</label>
    </div>
    <div class="form-outline mb-4">
        <input type="text" name="img" id="form2Example1" class="form-control" required/>
        <label class="form-label" for="form2Example1">Link Imagen Autor</label>
    </div>    
    <?php $_smarty_tpl->_subTemplateRender("file:nationality.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    <div class="form-outline mb-4">
        <input type="date" name="date" id="form2Example2" class="form-control" required/>
        <label class="form-label" for="form2Example2">Fecha de Nacimiento</label>
    </div>     
     <button type="submit" class="btn btn-primary btn-block mb-4">Agregar Autor</button>
    </form>
</div> 

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
