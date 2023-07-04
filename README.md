# Biblioteca_Virtual_API

# Obtencion de Token
Método: GET
Ruta: /login
Cuerpo de la solicitud: Usuario y contraseña

Ejemplo del cuerpo de la solicitud para obtener Token:
{
    "usuario": "usuario123",
    "contraseña": "contraseña123"
}

Respuesta:
Código de estado: 200 (Devuelve el Token).
Código de estado: 400 (Usuario o contraseña no coinciden con la base de datos).


# Pedir la lista de autores
Método: GET
Ruta: /autor

Respuesta:
Código de estado: 200(Obtenidos).
Cuerpo de respuesta: Devuelve todos los autores.

# Pedir la lista de autores con filtro "sort"(puede usarse con el order)
Método: GET
Ruta: /autor?sort=valor

Posibles valores del sort: "id", "nombre", "img_autor", "nacionalidad", "fecha_nac".

Respuesta:
Código de estado: 200(Obtenidos).
Cuerpo de respuesta: Devuelve todos los autores segun el valor ingresado.

# Pedir la lista de autores con filtro "order"(puede usarse con el sort)
Método: GET
Ruta: /autor?order=valor

Posibles valores del order: "asc", "desc".

Respuesta:
Código de estado: 200(Obtenidos).
Cuerpo de respuesta: Devuelve todos los autores segun el orden ingresado.

# Pedir un autor por su ID.
Método: GET
Ruta: /autor/:id

Respuesta:
Código de estado: 200 (Obtenido).
Código de estado: 404 (Si no existe el id).
Cuerpo de respuesta: Devuelve el autor que corresponde al id ingresado.

# Eliminar un autor por su id
Método: DELETE
Ruta: /autor/:id

Respuesta:
Código de estado: 200 (Eliminado).
Código de estado: 401 (Necesita loggearse para recibir un token o si ya fue dado, ingresarlo).
Código de estado: 404 (Si no existe el id).



# Agregar un nuevo autor
Método: POST
Ruta: /autor
Cuerpo de la solicitud: Objeto de autor a crear

Ejemplo del cuerpo de la solicitud para agregar:
{
    "nombre": "Herman Melville",
    "img_autor": "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Herman_Melville_by_Joseph_O_Eaton.jpg/486px-Herman_Melville_by_Joseph_O_Eaton.jpg",
    "nacionalidad": "Estados Unidos",
    "fecha_nac": "1819-08-01"
}
Valores requeridos: "nombre", "nacionalidad", "fecha_nac".
Valores opcionales: "img_autor".

Respuesta:
Código de estado: 201 (Creado).
Código de estado: 401 (Necesita loggearse para recibir un token o si ya fue dado, ingresarlo).
Cuerpo de respuesta: Devuelve objeto de autor creado.

# Modificar un autor
Método: PUT
Ruta: /autor/:id
Cuerpo de la solicitud: Objeto con los elementos a editar

Ejemplo del cuerpo de la solicitud para editar:
{
    "nombre": "Herman Melville",
    "img_autor": https://upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Herman_Melville_by_Joseph_O_Eaton.jpg/486px-Herman_Melville_by_Joseph_O_Eaton.jpg
}


Respuesta:
Código de estado: 201 (Editado).
Código de estado: 401 (Necesita loggearse para recibir un token o si ya fue dado, ingresarlo).
Código de estado: 404 (Si no existe el id).
Cuerpo de respuesta: Devuelve objeto de autor editado.


//Libros
# Pedir la lista de libros
Método: GET
Ruta: /libro

Respuesta:
Código de estado: 200(Obtenidos).
Cuerpo de respuesta: Devuelve todos los libros.

# Pedir la lista de libros con filtro "sort"(puede usarse con el order)
Método: GET
Ruta: /libro?sort=valor

Posibles valores del sort: "id", "titulo", "descripcion", "genero", "img_tapa", "id_autor".

Respuesta:
Código de estado: 200(Obtenidos).
Cuerpo de respuesta: Devuelve todos los libros segun el valor ingresado.

# Pedir la lista de libros con filtro "order"(puede usarse con el sort)
Método: GET
Ruta: /libro?order=valor

Posibles valores del order: "asc", "desc".

Respuesta:
Código de estado: 200(Obtenidos).
Cuerpo de respuesta: Devuelve todos los libros segun el orden ingresado.

# Pedir un libro por su ID.
Método: GET
Ruta: /libro/:id

Respuesta:
Código de estado: 200 (Obtenido).
Código de estado: 404 (Si no existe el id).
Cuerpo de respuesta: Devuelve el libro que corresponde al id ingresado.

# Eliminar un libro por su id
Método: DELETE
Ruta: /libro/:id

Respuesta:
Código de estado: 200 (Eliminado).
Código de estado: 401 (Necesita loggearse para recibir un token o si ya fue dado, ingresarlo).
Código de estado: 404 (Si no existe el id).



# Agregar un nuevo libro
Método: POST
Ruta: /libro
Cuerpo de la solicitud: Objeto de libro a crear

Ejemplo del cuerpo de la solicitud para agregar:
{
    "titulo": "Don Quijote de la Mancha",
    "descripcion": "Se trata de un relato satírico o burlesco del género medieval de las novelas de caballería, que dialoga con la tradición española y europea toda. Tuvo una gigantesca repercusión en la cultura literaria de la época y de los siglos posteriores.",
    "genero": "	Novela de aventuras, parodia de las novelas de caballerías, novela realista",
    "img_tapa": "https://www.edicontinente.com.ar/image/titulos/9788419087003.jpg",
    "id_autor": 15
}
Valores requeridos: "titulo", "genero", "id_autor".
Valores opcionales: "descripcion", "img_tapa".

Respuesta:
Código de estado: 201 (Creado).
Código de estado: 401 (Necesita loggearse para recibir un token o si ya fue dado, ingresarlo).
Código de estado: 404 (No se encontro el id_autor asignado a ese libro).
Cuerpo de respuesta: Devuelve objeto de libro creado.

# Modificar un libro
Método: PUT
Ruta: /libro/:id
Cuerpo de la solicitud: Objeto con los elementos a editar

Ejemplo del cuerpo de la solicitud para editar:
{
    "titulo": "Don Quijote de la Mancha",
    "id_autor": 15
}


Respuesta:
Código de estado: 201 (Modificado).
Código de estado: 401 (Necesita loggearse para recibir un token o si ya fue dado, ingresarlo).
Código de estado: 404 (Si no existe el id).
Código de estado: 404 (No se encontro el id_autor asignado a ese libro).
Cuerpo de respuesta: Devuelve objeto de libro editado.

