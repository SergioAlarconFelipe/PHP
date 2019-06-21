# Use example

## Example to debugger one variable
```php
<?php
include 'print_d';
print_d( 'hola mundo' );
```

Complete trace
```
C:\xampp\htdocs\prueba\index.php: 45 => funct21
C:\xampp\htdocs\prueba\src\class2.php: 24 => funct11
C:\xampp\htdocs\prueba\src\class1.php: 81
  [string (10)]: 
    hola mundo
```

## Example debug multiple variables
```php
<?php
include 'print_d';
prints_d( 'hola mundo', 25, [ -2 ] );
```

Complete trace
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
