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
