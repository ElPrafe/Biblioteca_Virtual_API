let listaBotonesBorrar = document.querySelectorAll('.eliminar');
listaBotonesBorrar.forEach(element => {
    element.addEventListener('click', function () {
        var id = this.id;
        let aceptarBorrado = document.getElementById('aceptar');
        aceptarBorrado.href=(this.classList.contains('libro')?"book":"author")+"/delete/"+id;
        console.log(aceptarBorrado.href);
        mostrarModal();
    });
});

let listaBotonesAceptar = document.querySelectorAll('#aceptar');
listaBotonesAceptar.forEach(element => {
    element.addEventListener('click', function () {
        cerrarModal();
    });
});


let listaBotonesCancelar = document.querySelectorAll('.cancelar');
listaBotonesCancelar.forEach(element => {
    element.addEventListener('click', function () {
        cerrarModal();
    });
});


function mostrarModal() {
    document.getElementById('modal').style.display = 'block';
    document.body.style.overflow = 'hidden'; // Deshabilitar el scroll de la página
}

function cerrarModal() {
    document.getElementById('modal').style.display = 'none';
    document.body.style.overflow = 'auto'; // Habilitar el scroll de la página
}

function eliminarEjemplar() {
    cerrarModal(); 
}