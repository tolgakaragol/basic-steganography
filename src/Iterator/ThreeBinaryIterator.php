<?php
/**
 * Created by PhpStorm.
 * User: tolgakaragol
 * Date: 2019-12-22
 * Time: 00:02
 */

namespace BasicSteganography\Iterator;

class ThreeBinaryIterator implements \Iterator
{

    /** @var array $binaries */
    private $binaries;

    /** @var int $key */
    private $key = 0;

    public function __construct(array $binaries)
    {
        $this->binaries = $binaries;
    }

    /**
     * Return the current element
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        return [
            $this->binaries[$this->key],
            $this->binaries[$this->key + 1],
            $this->binaries[$this->key + 2],
        ];
    }

    /**
     * Move forward to next element
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next(): void
    {
        $this->key += 3;
    }

    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key(): int
    {
        return $this->key / 3;
    }

    /**
     * Checks if current position is valid
     * @link https://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid(): bool
    {
        return array_key_exists($this->key, $this->binaries) &&
            array_key_exists($this->key + 1, $this->binaries) &&
            array_key_exists($this->key + 2, $this->binaries);
    }

    /**
     * Rewind the Iterator to the first element
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind(): void
    {
        $this->key = 0;
    }
}