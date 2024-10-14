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


### Métodos de Arrays
~~~
Con la posicion "-1" se puede referir al último elemento de una array en lo métodos.
~~~

Transformadores
~~~
pop() - Elimina el último elemento de un array y lo devuelve (el elemento eliminado).
shift() - Elimina el primer elemento de un array y lo devuelve.
push() - Agrega un elemento al array al final de la lista.
reverse() - Invierte el orden de los elementos de un array.
unshift() - Agrega uno o más elementos de un arreglo localmente y devuelve el array ordenado.
sort() - Ordena los elementos de un array localmente y devuelve el array ordenado.
splice() - Cambia el contenido de un array eliminando elementos existentes y/o agregando nuevos elementos.
~~~

Accesores
~~~
join() - Une todos los elementos de una matriz (o similar) en una cadena y la devuelve.
slice() - Devuelve una parte del array dentro de un nuevo array empezando por inicio hasta fin (fin no incluido).
~~~

De repetición
~~~
filter() - Crea un nuevo array con todos los elementos que cumplan la condición.
forEach() - Ejecuta la función indicada una vez por cada elemento del array.
map()
~~~

### Objeto Math

Métodos
~~~
sqrt() - Devuelve raíz cuadrada positiva de un número.
cbrt() - Devuevle raíz cúbica de un número.
max() - Devuelve el mayor de cero o más números.
min() - Devuelve el menór de cero o más números.
random() - Devuelve un número pseudo-aleatorio entre 0 y 1.
round() - Devuelve el valor de un número redondeado al número entero más cercano.
fround() - Devuelve la representación flotante de precisión simple más cercana de un número.
floor() - Devuelve el mayor entero menor que o igual a un número.
trunc() - Devuelve la parte entera de un número eliminando sus dígitos fraccionarios.
~~~

Propiedades
~~~
PI - Radio de la circunferencia de un círculo respecto a su diámetro (3.14159).
SQR1_2 Raíz cuadrada de 1/2.
SQRT2 - Raíz cuadrada de 2.

E - Constante Euler, la base de los logaritmos naturales.
LN2 - Logaritmo natural de 2.
LN10
LOG2E - Logaritmo de E con base 2.
LOG10E
~~~
