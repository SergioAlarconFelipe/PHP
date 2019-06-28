# Use example

## Parameters
1: Element to debuger.
2: Optionals options.
  Array de parametros sobre que mostrar de la variable:
  <ul>
	  	<li>'name'		=> String en el que indicamos el nombre de la variable indicada</li>
		  <li>'return'	=> String en el que indicamos si se imprimira o se devolvera el resultado</li>
  		<li>'title'		=> String que sera el titulo de la variable</li>
	  	<li>'args'		=> Boolean que indica si nostramos o no los argumentos de cada funcion llamada</li>
  </ul>

## Example to debugger one variable
Code
```php
<?php
include 'print_d';
print_d( 'hola mundo' );
```
Result
```
C:\xampp\htdocs\prueba\index.php: 45 => funct21
C:\xampp\htdocs\prueba\src\class2.php: 24 => funct11
C:\xampp\htdocs\prueba\src\class1.php: 81
  [string (10)]: 
    hola mundo
```

Code
```php
<?php
include 'print_d';
print_d( 'hola mundo', [ 'name' => 'n1', 'title' => 't1' ] );
```
Result
```
t1
C:\xampp\htdocs\prueba\index.php: 45 => funct21
C:\xampp\htdocs\prueba\src\class2.php: 24 => funct11
C:\xampp\htdocs\prueba\src\class1.php: 81
  n1 [string (10)]: 
    hola mundo
```

## Example debug multiple variables
Code
```php
<?php
include 'print_d';
prints_d( 'hola mundo', 25, [ -2 ] );
```
Result
```
C:\xampp\htdocs\prueba\index.php: 45 => funct21
C:\xampp\htdocs\prueba\src\class2.php: 24 => funct11
C:\xampp\htdocs\prueba\src\class1.php: 82
  [string (10)]: 
    hola mundo
C:\xampp\htdocs\prueba\index.php: 45 => funct21
C:\xampp\htdocs\prueba\src\class2.php: 24 => funct11
C:\xampp\htdocs\prueba\src\class1.php: 82
  [integer (2)]: 
    25
C:\xampp\htdocs\prueba\index.php: 45 => funct21
C:\xampp\htdocs\prueba\src\class2.php: 24 => funct11
C:\xampp\htdocs\prueba\src\class1.php: 82
  [array (1)]: 
    Array
    (
        [0] => -2
    )
```
