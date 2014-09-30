SmithStringSearchAlgorithm
==========================

PHP implementation of the smith algorithm

The algorithm can find a pattern in text. It can't find multiple patterns, but it's just a proof of concept.
I started with a fresh rewrite using oop so the code is cleaner and easier to use. This one actually work (:.

Sample usage:

include the file, use the namespace and

$smith = new Smith( "Text", "Pattern" );

$smith->Search();

Easy as two lines of code. Right now the output is the text highlighted with the matching pattern if the pattern is in the text. I haven't decided how to handle this yet.
