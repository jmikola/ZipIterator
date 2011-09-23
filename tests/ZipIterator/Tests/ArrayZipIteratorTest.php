<?php

namespace ZipIterator\Tests;

use ZipIterator\ArrayZipIterator;

class ArrayZipIteratorTest extends \PHPUnit_Framework_TestCase
{
    public function testZipNoArrays()
    {
        $this->assertEquals(array(), iterator_to_array(new ArrayZipIterator()));
    }

    public function testZipOneArray()
    {
        $input = array(
            array(1, 2, 3),
        );

        $zipped = array(
            array(1),
            array(2),
            array(3),
        );

        $this->assertEquals($zipped, iterator_to_array(ArrayZipIterator::createArgs($input)));
    }

    public function testZipShouldBeInvolutary()
    {
        $input = array(
            array(1, 2, 3),
            array(4, 5, 6),
        );

        $zipped = array(
            array(1, 4),
            array(2, 5),
            array(3, 6),
        );

        $this->assertEquals($zipped, iterator_to_array(ArrayZipIterator::createArgs($input)));
        $this->assertEquals($input, iterator_to_array(ArrayZipIterator::createArgs($zipped)));
    }

    public function testZipEvenArrays()
    {
        $input = array(
            array( 1,  2,  3,  4,  5),
            array( 6,  7,  8,  9, 10),
            array(11, 12, 13, 14, 15),
        );

        $zipped = array(
            array(1,  6, 11),
            array(2,  7, 12),
            array(3,  8, 13),
            array(4,  9, 14),
            array(5, 10, 15),
        );

        $this->assertEquals($zipped, iterator_to_array(ArrayZipIterator::createArgs($input)));
    }

    public function testZipUnevenArraysShouldTruncateLongerArrays()
    {
        $input = array(
            array( 1,  2,  3,  4,   ),
            array( 6,  7,  8,       ),
            array(11, 12, 13, 14, 15),
        );

        $zipped = array(
            array(1,  6, 11),
            array(2,  7, 12),
            array(3,  8, 13),
        );

        $this->assertEquals($zipped, iterator_to_array(ArrayZipIterator::createArgs($input)));
    }
}
