SmithStringSearchAlgorithm
==========================

PHP implementation of the smith algorithm

##To-do
* ~~remove the need to create an array of a fixed length.~~ used array_fill 256 for the number of indexes
* ~~use type-def so bad character arrays(boyer-moore & quicksearch) keys are numeric not characters~~ Not an option
* fix key offset issue - still and issue on line 121 of smithsearch.php
* ~~remove any C code that doesn't apply to php~~ Done
* ~~fix code that got messed up on the port.~~ Done
* ~~fix any issues with memcmp php because matching is off by 2 positions and displays more occurences than there is.~~ Found alternative from Java example arraycmp() is used
* added debugg array to see if the table matches the one from [smith algorithm resource in C](http://www-igm.univ-mlv.fr/~lecroq/string/node21.html#SECTION00210)
* Added smithsearch.php, working example with errors on line 121, offset and undefined index T errors but shows correct number of occurences and location.
