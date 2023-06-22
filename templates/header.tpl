<!DOCTYPE html>
<html lang="en">

<head>
  <base href="{BASE_URL}">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"
    integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            {if $logged}
              <li class="nav-item">
                <a class="nav-link" href="author/add">Agregar Autor</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="book/add">Agregar Libro</a>
              </li>
            {/if}
          </ul>
          <div class="d-flex">
            {if $logged}
              <a class="nav-link navbar-brand" href="logout">Desconectarse</a>
            {else}
              <a class="nav-link navbar-brand" href="login">Ingresar</a>
            {/if}
          </div>
        </div>
      </div>
    </nav>
  </header>

  <!-- inicio main container -->
<div class="container">