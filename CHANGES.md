# Changelog



## Release 2.0.0

- The library requires PHP 7.1

- The **search** method in ***SearchablelInterface***  has a new return type declaration.  `?int` requires the method to return *null* if the given value can not be found.
- There is a new ***SearchableTrait*** that implements the new *search* method.

