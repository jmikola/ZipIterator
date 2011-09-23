<?php

namespace ZipIterator;

class ArrayZipIterator extends AbstractZipIterator
{
    /**
     * @see ZipIterator\AbstractZipIterator::rewind()
     */
    public function rewind()
    {
        parent::rewind();

        foreach ($this->args as &$arg) {
            reset($arg);
        }
    }

    /**
     * @see ZipIterator\AbstractZipIterator::initCurrentAndValid()
     */
    protected function initCurrentAndValid()
    {
        if (!isset($this->valid)) {
            if (empty($this->args)) {
                $this->current = null;
                $this->valid = false;
                return;
            }

            $this->current = array();
            $this->valid = true;

            foreach ($this->args as &$arg) {
                if (list($key, $value) = each($arg)) {
                    $this->current[] = $value;
                } else {
                    $this->current = null;
                    $this->valid = false;
                    return;
                }
            }
        }
    }
}
