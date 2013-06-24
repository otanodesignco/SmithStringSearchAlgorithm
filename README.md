SmithStringSearchAlgorithm
==========================

PHP implementation of the smith algorithm

##To-do
* ~~remove the need to create an array of a fixed length.~~
* ~~use type-def so bad character arrays(boyer-moore & quicksearch) keys are numeric not characters~~ Not an option
* fix key offset issue
* ~~remove any C code that doesn't apply to php~~
* ~~fix code that got messed up on the port.~~
* fix any issues with memcmp php because matching is off by 2 positions and displays more occurences than there is.
* added debugg array to see if the table matches the one from [http://www-igm.univ-mlv.fr/~lecroq/string/node21.html#SECTION00210]
