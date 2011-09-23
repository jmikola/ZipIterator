<?php

namespace ZipIterator;

abstract class AbstractZipIterator implements \Iterator
{
    protected $args;
    protected $current;
    protected $position;
    protected $valid;

    /**
     * Constructor.
     *
     * @param array $v,...
     */
    public function __construct()
    {
        $this->args = func_get_args();
        $this->position = 0;
    }

    /**
     * Convenience method for creating a ZipIterator instance when the
     * constructor arguments are already in an array.
     *
     * @param array $args Parameters to be passed to the constructor as an array
     */
    final public static function createArgs($args)
    {
        $ref = new \ReflectionClass(get_called_class());
        return $ref->newInstanceArgs($args);
    }

    /**
     * Return the current element.
     *
     * @see Iterator::current()
     * @return array
     */
    public function current()
    {
        $this->initCurrentAndValid();

        return $this->current;
    }

    /**
     * Return the key of the current element.
     *
     * @see Iterator::key()
     * @return integer
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Move forward to next element.
     *
     * @see Iterator::next()
     */
    public function next()
    {
        ++$this->position;
        $this->current = $this->valid = null;
    }

    /**
     * Rewind the Iterator to the first element.
     *
     * @see Iterator::rewind()
     */
    public function rewind()
    {
        $this->position = 0;
        $this->current = $this->valid = null;
    }

    /**
     * Check if there is a current element after calls to rewind() or next().
     *
     * @see Iterator::valid()
     * @return boolean
     */
    public function valid()
    {
        $this->initCurrentAndValid();

        return $this->valid;
    }

    /**
     * Determine the validity of the current position and the element's value.
     */
    abstract protected function initCurrentAndValid();
}
