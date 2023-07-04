<?php
/* Smarty version 4.3.1, created on 2023-06-20 17:33:44
  from 'C:\xampp\htdocs\TPEWEB\Biblioteca_Virtual\templates\book.add.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_6491c6d84f8ca2_46504296',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cf43681c00ee194b2e8a1adc1165e867bae928a5' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWEB\\Biblioteca_Virtual\\templates\\book.add.tpl',
      1 => 1687275132,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_6491c6d84f8ca2_46504296 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
<div class="col-md-8 formulario_add">
    <form action="book/addAttempt" method="POST">
        <fieldset>
            <legend class="text-left header2">Editar libro</legend>
            <span class="form-group d-flex align-items-center"><i class="fa fa-book bigicon"></i>
                <input id="form2Example1" name="title" type="text" placeholder="Título del libro" class="form-control"
                    required>
            </span>

            <span class="form-group d-flex align-items-center"><i class="fa fa-image bigicon"></i>
                <input id="form2Example2" name="img" type="text" placeholder="URL imagen del libro"
                    class="form-control">
            </span>

            <span class="form-group d-flex align-items-center"><i class="fa fa-quote-left bigicon"></i>
                <input id="form2Example1" name="genre" type="text" placeholder="Género/s del libro" class="form-control"
                    required>
            </span>

            <span class="form-group d-flex align-items-center"><i class="fa fa-feather bigicon"></i>
                <textarea rows="7" id="descripcion_libro" name="desc" placeholder="Descripción del libro"
                    class="form-control"></textarea>
            </span>
            <span class="form-group d-flex align-items-center"><i class="fa fa-user-tie bigicon"></i>
                <select class="nacionality" name="author"
                    required>                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['authors']->value, 'author');
$_smarty_tpl->tpl_vars['author']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['author']->value) {
$_smarty_tpl->tpl_vars['author']->do_else = false;
?>
                        <option value="<?php echo $_smarty_tpl->tpl_vars['author']->value->id;?>
"><?php echo $_smarty_tpl->tpl_vars['author']->value->nombre;?>
</option>
                    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                </select>
            </span>
            <button type="submit" class="btn btn-primary submit">Agregar Libro</button>
        </fieldset>
    </form>
</div>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
