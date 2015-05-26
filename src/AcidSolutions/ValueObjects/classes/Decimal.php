<?php namespace AcidSolutions\ValueObjects\Classes;

use Exception;
use Illuminate\Support\Contracts\ArrayableInterface;
use Illuminate\Support\Contracts\JsonableInterface;
use InvalidArgumentException;
/**
 * Decimal
 **/
class Decimal implements ArrayableInterface, JsonableInterface
{
    protected $value;
    protected $afterDot;

    function __construct( $value = 0, $afterDot = 2 )
    {
        $this->afterDot = (int) $afterDot;
        $this->value = $this->format((string)$value);
    }

    private function format($value)
    {
        return number_format(round(floatval($value), $this->afterDot), $this->afterDot, '.', '');
    }

    public function add( $value )
    {
        if ( ! is_object($value) and ( is_string($value) or is_numeric($value) ) )
        {
            $value = $this->format($value);

        } else if ( is_object($value) and get_class($value) === 'AcidSolutions\ValueObjects\Classes\Decimal' ) {

            $value = $this->format($value->value);

        } else {
            throw new InvalidArgumentException("Must be a correct number", 1);

        }

        $this->value += $value;

        $this->value = $this->format($this->value);
        return $this;
    }

    public function reduce( $value )
    {
        if ( ! is_object($value) and ( is_string($value) or is_numeric($value) ) )
        {
            $value = $this->format($value);

        } else if ( is_object($value) and get_class($value) === 'AcidSolutions\ValueObjects\Classes\Decimal' ) {

            $value = $this->format($value->value);

        } else {
            throw new InvalidArgumentException("Must be a correct number", 1);

        }

        $this->value -= $value;
        $this->value = $this->format($this->value);
        return $this;
    }

    public function multiple( $value )
    {
        if ( ! is_object($value) and ( is_string($value) or is_numeric($value) ) )
        {
            $value = $this->format($value);

        } else if ( is_object($value) and get_class($value) === 'AcidSolutions\ValueObjects\Classes\Decimal' ) {

            $value = $this->format($value->value);

        } else {
            throw new InvalidArgumentException("Must be a correct number", 1);

        }

        $this->value *= $value;
        $this->value = $this->format($this->value);
        return $this;
    }

    public function isLowerThan($value) {
        $value = new Decimal($value);
        return $this->value < $value->value;
    }

    public function isLowerOrEqualTo($value) {
        $value = new Decimal($value);
        return $this->value <= $value->value;
    }

    public function isHigherThan($value) {
        $value = new Decimal($value);
        return $this->value > $value->value;
    }
    public function isHigherOrEqualTo($value) {
        $value = new Decimal($value);
        return $this->value >= $value->value;
    }

    public function isEqualTo($testable)
    {
        $testableDecimal = new Decimal($testable);

        return $this->value === $testableDecimal->value;
    }

    public function isPositive()
    {
        return $this->value > 0.00;
    }

    public function isNegative() {
        return $this->value < 0.00;
    }

    public function isBetween($value, $compare) {
        $value = new Decimal($value);
        $compare = new Decimal($compare);

        return $this->value > $value->value and $this->value < $compare->value;
    }
    
    public function round()
    {
        $this->value = $this->format(round($this->value));

        return $this;
    }

    public function __get($key)
    {
        if ($key === 'value')
        {
            return $this->value;
        }
    }

    public function toArray()
    {
        return $this->value;
    }

    public function toJson($options = 0)
    {
        return json_encode($this->value, $options);
    }

    public function __invoke()
    {
        return $this->value;
    }
    public function __toString()
    {
        return $this->value;
    }
}
