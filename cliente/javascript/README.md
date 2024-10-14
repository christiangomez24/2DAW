# Apuntes JS.

A la hora de buscar errores hay que mirar en primer lugar en la consola de desarrollador y más tarde en el código. No ir directamente al código fuente.

### Autoincrementar antes de asignar el valor.
Al ir a asignar una variable si se autoincrementa primero, al momento de asignarla pasará el valor incrementado:
~~~
x=1;
y = ++x;
y=2;
x=2;
~~~


### Autoincrementar después de asignar el valor.
Al ir a asignar una variable si se autoincrementa después, al momento de asignarla pasará el valor anterior a imncrementarse, posteriormente se incrementará y ambas "x" valdrán lo mismo pero no las dos "y":

~~~
x=1;
y= x++;
y=1;
x=2;
~~~

### Métodos de cadenas

~~~
concat() - junta dos o más cadenas y retorna una nueva
startsWith() - Si una cadena comienza con los carácteres de otra cadena devuelve true, si no, false.
endsWith() - si una cadena termina con los carácteres de otra cadena, devuelve true, si no, false.
includes() - si una cadena puede encontrarse dentro de otra cadena, devuelve true, si no, false.
indexOf() - devuelve el indice del primer carácter de la cadena, si no existe devuelve "-1".
lastIndexOf() - devuelve el último índice del primer carácter de la cadena, si no existe devuelve "-1".
padStart() - Rellena la cadena al principio con los carácteres deseados.
padEnd() - Rellena cadena al final con carácteres deseados.
split()- Divide la cadena como le pidamos.
substring() - Nos retorna un pedazo de la cadena que seleccionamos.
toLowerCase() - Convierte una cadena a minúscula.
toUpperCase() - Convierte una cadena a mayúscula.
toString() - Devuelve una cadena que representa al objeto especificado.
trim() - elimina los espacios en blanco al principio y final de una cadena.
trimEnd() - Elimina los espacios en blanco al final de una cadena.
trimStart() - Elimina los espacios en blanco al principio de una cadena.
valueOf() - Retorna el valor primitivo de un objeto string.
~~~
