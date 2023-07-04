<?php
/* Smarty version 4.3.1, created on 2023-06-20 22:03:15
  from 'C:\xampp\htdocs\TPEWEB\Biblioteca_Virtual\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.1',
  'unifunc' => 'content_649206030ba479_97504725',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cd027a55ceae3a2a7d667f1affa212f4bd097f96' => 
    array (
      0 => 'C:\\xampp\\htdocs\\TPEWEB\\Biblioteca_Virtual\\templates\\header.tpl',
      1 => 1687291123,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_649206030ba479_97504725 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">

<head>
  <base href="<?php echo BASE_URL;?>
">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
    integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
    crossorigin="anonymous" referrerpolicy="no-referrer"><?php echo '</script'; ?>
>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.4.0/css/all.min.css"
    integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <title>Biblioteca Virtual</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark col-12">
      <div class="container-fluid">
        <a class="navbar-brand" href="author/all">Autores</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mynavbar">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="book/all">Libros</a>
            </li>
            <li class="nav-item">

            </li>
            <?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
              <li class="nav-item">
                <a class="nav-link" href="author/add">Agregar Autor</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="book/add">Agregar Libro</a>
              </li>
            <?php }?>
          </ul>
          <div class="d-flex">
            <?php if ($_smarty_tpl->tpl_vars['logged']->value) {?>
              <a class="nav-link navbar-brand" href="logout">Desconectarse</a>
            <?php } else { ?>
              <a class="nav-link navbar-brand" href="login">Ingresar</a>
            <?php }?>
          </div>
        </div>
      </div>
    </nav>
  </header>

  <!-- inicio main container -->
<div class="container"><?php }
}
