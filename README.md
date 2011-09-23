# ZipIterator

A reimplementation of Python's [zip()][] function in PHP. Technically, this is
a port of [izip()][], but obtaining an array result is quite trivial thanks to
SPL's `iterator_to_array()` function.

Currently, the iterators return a list truncated to the length of its shortest
argument. Support for arguments of uneven length and padding (in the style of
[izip_longest][] and [Ruby][] is on the TODO list.

This library includes two classes for zipping arrays and strings, respectively:
`ArrayZipIterator` and `StringZipIterator`. Please see the test cases for
usage examples until additional documentation is written.

  [zip()]: http://docs.python.org/library/functions.html#zip
  [izip()]: http://docs.python.org/library/itertools.html#itertools.izip
  [izip_longest()]: http://docs.python.org/library/itertools.html#itertools.izip_longest
  [Ruby]: http://www.ruby-doc.org/core/classes/Enumerable.html#M001517
