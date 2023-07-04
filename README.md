# Biblioteca_Virtual_API

# Pedir la lista de autores
Método: GET
Ruta: /autor

Respuesta:
Código de estado: 200.
Cuerpo de respuesta: Devuelve todos los autores.

# Pedir la lista de autores con filtro "sort"(puede usarse con el order)
Método: GET
Ruta: /autor?sort=valor

Posibles valores del sort: "id", "nombre", "img_autor", "nacionalidad", "fecha_nac".

Respuesta:
Código de estado: 200.
Cuerpo de respuesta: Devuelve todos los autores segun el valor ingresado.

# Pedir la lista de autores con filtro "order"(puede usarse con el sort)
Método: GET
Ruta: /autor?order=valor

Posibles valores del order: "asc", "desc".

Respuesta:
Código de estado: 200.
Cuerpo de respuesta: Devuelve todos los autores segun el orden ingresado.

# Pedir un autor por su ID.
Método: GET
Ruta: /autor/:id

Respuesta:
Código de estado: 200 si existe el id.
Código de estado: 404 si no existe el id.
Cuerpo de respuesta: Devuelve el autor que corresponde al id ingresado.

# Eliminar un autor por su id
Método: DELETE
Ruta: /autor/:id

Respuesta:
Código de estado: 200 si existe el id.
Código de estado: 404 si no existe el id.
Cuerpo de respuesta: Devuelve el autor que corresponde al id ingresado.



# Agregar un nuevo autor
Método: POST
Ruta: /autor
Cuerpo de la solicitud: Objeto de autor a crear

Ejemplo del cuerpo de la solicitud:
{
    "nombre": "Herman Melville",
    "img_autor": https://upload.wikimedia.org/wikipedia/commons/thumb/e/e8/Herman_Melville_by_Joseph_O_Eaton.jpg/486px-Herman_Melville_by_Joseph_O_Eaton.jpg,
    "nacionalidad": "Estados Unidos",
    "fecha_nac": "1819-08-01"
}
Valores requeridos: "nombre", "nacionalidad", "fecha_nac".
Valores opcionales: "img_autor".

Respuesta:
Código de estado: 201 (Creado).
Cuerpo de respuesta: Devuelve objeto de autor creado.