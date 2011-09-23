<?php

namespace ZipIterator;

class StringZipIterator extends AbstractZipIterator
{
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

            foreach ($this->args as $arg) {
                if (isset($arg[$this->position])) {
                    $this->current[] = $arg[$this->position];
                } else {
                    $this->current = null;
                    $this->valid = false;
                    return;
                }
            }
        }
    }
}
