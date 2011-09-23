<?php

namespace ZipIterator\Tests;

use ZipIterator\StringZipIterator;

class StringZipIteratorTest extends \PHPUnit_Framework_TestCase
{
    public function testZipNoStrings()
    {
        $this->assertEquals(array(), iterator_to_array(new StringZipIterator()));
    }

    public function testZipOneString()
    {
        $input = array(
            'abc',
        );

        $zipped = array(
            array('a'),
            array('b'),
            array('c'),
        );

        $this->assertEquals($zipped, iterator_to_array(StringZipIterator::createArgs($input)));
    }

    public function testZipShouldBeInvolutary()
    {
        $input = array(
            'abc',
            'def',
        );

        $zipped = array(
            array('a', 'd'),
            array('b', 'e'),
            array('c', 'f'),
        );

        $this->assertEquals($zipped, iterator_to_array(StringZipIterator::createArgs($input)));
        // Zipped tuples must be rejoined into single strings
        $this->assertEquals($input, array_map('implode', iterator_to_array(StringZipIterator::createArgs($zipped))));
    }

    public function testZipEvenStrings()
    {
        $input = array(
            'abcdef',
            'ghijkl',
            'mnopqr',
        );

        $zipped = array(
            array('a', 'g', 'm'),
            array('b', 'h', 'n'),
            array('c', 'i', 'o'),
            array('d', 'j', 'p'),
            array('e', 'k', 'q'),
            array('f', 'l', 'r'),
        );

        $this->assertEquals($zipped, iterator_to_array(StringZipIterator::createArgs($input)));
    }

    public function testZipUnevenStringsShouldTruncateLongerStrings()
    {
        $input = array(
            'abcd',
            'ghi',
            'mnopqr',
        );

        $zipped = array(
            array('a', 'g', 'm'),
            array('b', 'h', 'n'),
            array('c', 'i', 'o'),
        );

        $this->assertEquals($zipped, iterator_to_array(StringZipIterator::createArgs($input)));
    }
}
