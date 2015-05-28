# ValueObjects

It's an easy to use bulk of classes.

## Install

## Classes

- Decimal
- String

### Decimal

Provide an easy way to use Decimal numbers
```php
$decimal = new Decimal("1");

echo $decimal; // 1.00

$decimal === 1.00; // false

$decimal->value === 1.00; // true

$decimal() === 1.00; //true

$decimal->add('3')->multiple(4)->reduce(new Decimal(1));

echo $decimal; // 15.00

// Use it in function parameter

class SomeAwesomeClass
{
    public function plusOneMaybeAndDisplay( Decimal $prettyDecimal )
    {
        if ( rand(0,1) )
        {
            $prettyDecimal->add(1);
        }

        echo $prettyDecimal;
    }
}

// Methods:
$decimal->isEqualTo(x) // Boolean
$decimal->isPositive() // Boolean
$decimal->isLowerThan(x) // Boolean
$decimal->isLowerOrEqualTo(x) // Boolean
$decimal->isHigherThan(x) // Boolean
$decimal->isHigherOrEqualTo(x) // Boolean

```

### String

```php
$myString = new String('a string');

$myString->upper()->contains('STRING');

// Use it in function parameter

class SomeAwesomeClass
{
    public function crazyFunction( String $sexyString )
    {
        // Do something with this fucking sexyString !
    }
}
```
