<?php
/**
 * Created by PhpStorm.
 * User: tolgakaragol
 * Date: 2019-12-21
 * Time: 23:31
 */

namespace BasicSteganography\Iterator;


class ThreePixelIterator implements \Iterator, \Countable
{
    private $pixels;

    private $key = 0;

    public function __construct(array &$pixels)
    {
        $this->pixels = $pixels;
    }

    /**
     * Return the current element
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current(): array
    {
        return [
            1 => $this->pixels[$this->key],
            2 => $this->pixels[$this->key + 1],
            3 => $this->pixels[$this->key + 2],
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
        return array_key_exists($this->key, $this->pixels) &&
            array_key_exists($this->key + 1, $this->pixels) &&
            array_key_exists($this->key + 2, $this->pixels);
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

    /**
     * Count elements of an object
     * @link https://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     * </p>
     * <p>
     * The return value is cast to an integer.
     * @since 5.1.0
     */
    public function count()
    {
        return floor(count($this->pixels) / 3);
    }
}