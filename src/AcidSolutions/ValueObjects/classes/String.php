<?php namespace AcidSolutions\ValueObjects\Classes;

use Illuminate\Support\Str;
use Illuminate\Support\Contracts\ArrayableInterface;
use Illuminate\Support\Contracts\JsonableInterface;
/**
 * String
 **/
class String implements ArrayableInterface, JsonableInterface
{
    protected $value;

    function __construct( $value = '' )
    {
        $this->value = (string) $value;
    }

    /**
     * Translate a UTF-8 value to ASCII
     **/
    public function ascii()
    {
        $this->value = Str::ascii($this->value);

        return $this;
    }

    /**
     * Convert a value to camel case
     **/
    public function camel()
    {
        $this->value = Str::camel($this->value);
        return $this;
    }

    /**
     * Determine if a given string contains a given sub-string
     **/
    public function contains($needle)
    {
        return Str::contains($this->value, $needle);
    }

    /**
     * Determine if a given string ends with a given needle
     **/
    public function endsWith($needles)
    {
        return Str::endsWith($this->value, $needles);
    }

    /**
     * Cap a string with a single instance of a given pattern
     **/
    public function finish($cap)
    {
        $this->value = Str::finish($this->value, $cap);

        return $this;
    }

    /**
     * Determine if a given string matches a given pattern
     **/
    public function is($pattern)
    {
        return Str::is($pattern, $this->value);
    }

    /**
     * Return the length of the given string
     **/
    public function length()
    {
        return Str::length($this->value);
    }

    /**
     * limit
     **/
    public function limit($limit = 100, $end = '...')
    {
        $this->value = Str::limit($this->value, $limit, $end);

        return $this;
    }

    /**
     * Convert the given string to lower-case
     **/
    public function lower()
    {
        $this->value = Str::lower($this->value);

        return $this;
    }

    /**
     * Limit the number of words in a string
     **/
    public function words($words = 100, $end = '...')
    {
        $this->value = Str::words($this->value, $words, $end);

        return $this;
    }

    /**
     * Generate a more truly "random" alpha-numeric string
     **/
    public function random($length = 16)
    {
        $this->value = Str::random($length);

        return $this;
    }

    /**
     * Generate a "random" alpha-numeric string
     **/
    public function quickRandom($length = 16)
    {
        $this->value = Str::quickRandom($length);

        return $this;
    }

    /**
     * Convert the given string to upper-case
     **/
    public function upper()
    {
        $this->value = Str::upper($this->value);

        return $this;
    }

    /**
     * Convert the given string to title case
     **/
    public function title()
    {
        $this->value = Str::title($this->value);

        return $this;
    }

    /**
     * Generate a URL friendly "slug" from a given string
     **/
    public function slug($separator = '-')
    {
        $this->value = Str::slug($this->value, $separator);

        return $this;
    }

    /**
     * Convert a string to snake case
     **/
    public function snake($delimiter = '_')
    {
        $this->value = Str::snake($this->value, $delimiter);

        return $this;
    }

    /**
     * Determine if a string starts with a given needle
     **/
    public function startsWith($needles)
    {
        return Str::startsWith($this->value, $needles);
    }

    /**
     * Convert a value to studly caps case
     **/
    public function studly()
    {
        $this->value = Str::studly($this->value);

        return $this;
    }

    public function toArray()
    {
        return $this->value;
    }

    public function toJson($options = 0)
    {
        return json_encode($this->value, $options);
    }

    public function __get($key)
    {
        if ($key === 'value') {
            return $this->value;
        }
    }

    public function __toString()
    {
        return (string) $this->value;
    }
}
