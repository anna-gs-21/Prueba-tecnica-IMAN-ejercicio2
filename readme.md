# 1. Ejecucción

Para probar que el script funcionara correctamente, también he creado un pequeño HTML que lo llame.

Lo he desplegado con Apache usando XAMPP, porque ya lo había usado antes y lo tenía instalado.

# 2. Requisitos

Se han cumplido todos los requisitos propuestos:
* Obtener la acción y los campos.
* Validar si la acción y la sesión existen.
* Validar y sanizar los campos.
* Control de errores.

# 3. Desarrollo y decisiones

Esta vez leí todo el enunciado del ejercicio con calma para ver la visión general del script.

Al leer la descripción del ejercicio, vi claramente de que se trataba de un controlador que dirige las solicitudes, como si fueran endpoints. 

Ya había trabajado con este tipo de scripts, pero aún así, nunca los he creado desde cero, así que me tomó mi tiempo construirlo y entenderlo todo.

Primero empecé con la recepción de la solicitud y su validación. Después investigue como limpiar los datos para que sean seguros y poder llamar a la función correspondente. Y mientras, iba añadiendo excepciones para tener el control de errores.

He dejado la parte que valida la sesión comentada para poder probar que todo funcione correctamente, ya que realmente no se está gestionando una sesión. Pero si la descomentas, saltará el error de "no autorización".

# 4. Reflexión

Al igual que con el primer ejercicio, este segundo me ha permitido aprender sobre el propio lenguaje php como la arquitectura de este tipo de scripts enrutadores.

# 5. Fuentes de información

[PHP array_key_exists() Function](https://www.w3schools.com/php/func_array_key_exists.asp)

[PHP isset() Function](https://www.w3schools.com/Php/func_var_isset.asp)

[Validación y sanitización de datos en PHP](https://www.luisllamas.es/php-validacion-y-sanitizacion-de-datos-en-php/)

[PHP function comments](https://stackoverflow.com/questions/1310050/php-function-comments)


