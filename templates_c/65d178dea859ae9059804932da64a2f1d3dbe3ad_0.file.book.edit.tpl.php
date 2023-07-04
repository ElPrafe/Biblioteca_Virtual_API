<?php
/* Smarty version 4.3.1, created on 2023-06-20 17:33:24
  from 'C:\xampp\htdocs\TPEWEB\Biblioteca_Virtual\templates\book.edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6491c6c406e251_03267900',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '65d178dea859ae9059804932da64a2f1d3dbe3ad' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWEB\\Biblioteca_Virtual\\templates\\book.edit.tpl',
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
function content_6491c6c406e251_03267900 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="author_details d-inline-flex mt-5">
    <div class="col-md-8 formulario">
        <form action="book/editAttempt/<?php echo $_smarty_tpl->tpl_vars['book']->value->id;?>
" method="POST">
            <fieldset>
                <legend class="text-left header2">Editar libro</legend>
                <span class="form-group d-flex align-items-center"><i class="fa fa-book bigicon"></i>
                    <input id="form2Example1" name="title" value="<?php echo $_smarty_tpl->tpl_vars['book']->value->titulo;?>
" type="text"
                        placeholder="Título del libro" class="form-control" required>
                </span>

                <span class="form-group d-flex align-items-center"><i class="fa fa-image bigicon"></i>
                    <input id="form2Example2" name="img" value="<?php echo $_smarty_tpl->tpl_vars['book']->value->img_tapa;?>
" type="text"
                        placeholder="URL imagen del libro" class="form-control">
                </span>

                <span class="form-group d-flex align-items-center"><i class="fa fa-quote-left bigicon"></i>
                    <input id="form2Example1" name="genre" value="<?php echo $_smarty_tpl->tpl_vars['book']->value->genero;?>
" type="text"
                        placeholder="Género/s del libro" class="form-control" required>
                </span>

                <span class="form-group d-flex align-items-center"><i class="fa fa-feather bigicon"></i>
                    <textarea rows="7" id="descripcion_libro" name="desc" placeholder="Descripción del libro"
                        class="form-control"><?php echo $_smarty_tpl->tpl_vars['book']->value->descripcion;?>
</textarea>
                </span>
                <span class="form-group d-flex align-items-center"><i class="fa fa-user-tie bigicon"></i>
                    <select class="nacionality" name="author"
                        required>                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['authors']->value, 'author');
$_smarty_tpl->tpl_vars['author']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['author']->value) {
$_smarty_tpl->tpl_vars['author']->do_else = false;
?>
                            <?php if (($_smarty_tpl->tpl_vars['author']->value->id == $_smarty_tpl->tpl_vars['book']->value->id_autor)) {?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['author']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['author']->value->nombre;?>
</option>
                            <?php }?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['authors']->value, 'author');
$_smarty_tpl->tpl_vars['author']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['author']->value) {
$_smarty_tpl->tpl_vars['author']->do_else = false;
?>
                            <?php if (($_smarty_tpl->tpl_vars['author']->value->id != $_smarty_tpl->tpl_vars['book']->value->id_autor)) {?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['author']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['author']->value->nombre;?>
</option>
                            <?php }?>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </select>
                </span>
                <button type="submit" class="btn btn-primary submit">Editar Libro</button>
            </fieldset>
        </form>
    </div>
    <div class="tarjeta_edit">
        <h1 class="titulo_libro_edit"><?php echo $_smarty_tpl->tpl_vars['author']->value->nombre;?>
</h1>
        <div class="caja_descripcion_libro_edit row d-flex justify-content-center">
            <h4 class="titulo_tarjeta">
                <a><?php echo $_smarty_tpl->tpl_vars['book']->value->titulo;?>
</a>
            </h4>
            <img class="img_libro_edit col" src="<?php echo $_smarty_tpl->tpl_vars['book']->value->img_tapa;?>
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
