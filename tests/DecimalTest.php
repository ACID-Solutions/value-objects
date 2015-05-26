<?php

use AcidSolutions\ValueObjects\Classes\Decimal;
use Way\Tests\Should;

/**
 * Decimal Tests class
 **/
class DecimalTest extends PHPUnit_Framework_TestCase
{

    public function test_decimal_can_be_instantiate()
    {
        $decimal = new Decimal;
    }

    public function test_decimal_with_int()
    {
        $decimal = new Decimal(1);

        Should::eq($decimal->value, 1.00);
    }

    public function test_decimal_with_string()
    {
        $decimal = new Decimal("1.11");

        Should::eq($decimal->value, 1.11);
    }

    public function test_decimal_with_decimal()
    {
        $decimal = new Decimal( new Decimal(1.11));

        Should::eq($decimal->value, 1.11);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function test_reduce_should_thrown_an_error()
    {
        $decimal = new Decimal(1);

        $decimal->reduce(null);
    }

    public function test_reduce_with_Decimal()
    {
        $decimal = new Decimal(3);

        $decimal->reduce(new Decimal(2));
    }

    public function test_decimal_reduce()
    {
        $decimal = new Decimal(1.11);

        $decimal->reduce(0.11);

        Should::eq($decimal->value, 1.00);
    }

    public function test_decimal_multiple()
    {
        $decimal = new Decimal(2);

        $decimal->multiple(2);

        Should::eq($decimal->value, 4.00);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function test_multiple_should_thrown_an_error()
    {
        $decimal = new Decimal(1);

        $decimal->multiple(null);
    }

    public function test_chaining_decimal()
    {
        $decimal = new Decimal();

        $decimal1 = new Decimal(1);

        $decimal2 = new Decimal(2);

        $decimal->add($decimal1)->multiple($decimal2);

        Should::eq($decimal->value, 2.00);
    }

    public function test_decimal_should_be_invokable()
    {
        $decimal = new Decimal(1);

        Should::eq($decimal(), 1.00);
    }

    public function test_decimal_to_array()
    {
        $decimal = new Decimal(2);

        Should::eq($decimal, $decimal->toArray());

    }

    public function test_decimal_to_json()
    {
        $decimal = new Decimal(2);

        Should::eq(json_encode($decimal->value), $decimal->toJson());

    }

    public function test_int_casting()
    {
        $decimal = new Decimal(2);

        Should::eq(2, (int)$decimal->value);
    }

    /*
    |--------------------------------------------------------------------------
    | Add Method
    |--------------------------------------------------------------------------
    */
    public function test_add_method()
    {
        $decimal = new Decimal(2);

        $decimal->add(3);

        Should::eq(5.00, $decimal->value);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function test_add_should_thrown_an_error()
    {
        $decimal = new Decimal(1);

        $decimal->add(null);
    }

    public function test_is_positive()
    {
        $decimal = new Decimal(1);

        Should::eq(true, $decimal->isPositive());
        $decimal = new Decimal(-1);
        Should::eq(false, $decimal->isPositive());
        $decimal = new Decimal('1.00');
        Should::eq(true, $decimal->isPositive());
    }

    public function test_is_negative()
    {
        $decimal = new Decimal(1);

        Should::eq(false, $decimal->isNegative());
        $decimal = new Decimal(-1);
        Should::eq(true, $decimal->isNegative());
    }

    public function test_is_lower_than()
    {
        $decimal = new Decimal(5);

        Should::eq(true, $decimal->isLowerThan(10));
        Should::eq(false, $decimal->isLowerThan(3));
        Should::eq(false, $decimal->isLowerThan(5));
    }
    public function test_is_lower_than_or_equal_to()
    {
        $decimal = new Decimal(5);

        Should::eq(true, $decimal->isLowerOrEqualTo(10));
        Should::eq(false, $decimal->isLowerOrEqualTo(3));
        Should::eq(true, $decimal->isLowerOrEqualTo(5));
    }

    public function test_is_higher_than()
    {
        $decimal = new Decimal(5);

        Should::eq(false, $decimal->isHigherThan(10));
        Should::eq(true, $decimal->isHigherThan(3));
        Should::eq(false, $decimal->isHigherThan(5));
    }

    public function test_is_higher_than_or_equal_to()
    {
        $decimal = new Decimal(5);

        Should::eq(false, $decimal->isHigherOrEqualTo(10));
        Should::eq(true, $decimal->isHigherOrEqualTo(3));
        Should::eq(true, $decimal->isHigherOrEqualTo(5));
    }

    public function test_between_function()
    {
        $decimal = new Decimal(5);

        Should::eq(false, $decimal->isBetween(5, 10));
        Should::eq(true, $decimal->isBetween(2, 6));
        Should::eq(true, $decimal->isBetween('4', '7'));

    }

    public function test_is_equal_to()
    {
        $decimal = new Decimal(2);

        Should::eq(true, $decimal->isEqualTo(2.00));
        Should::eq(true, $decimal->isEqualTo(2));
        Should::eq(true, $decimal->isEqualTo(2.0));
        Should::eq(true, $decimal->isEqualTo('2.0'));
    }

    public function test__get()
    {
        $decimal = new Decimal;

        Should::eq(null, $decimal->afterDot);
    }

    public function test_can_be_round()
    {
        $decimal = new Decimal(3.33);

        Should::eq(3.00, $decimal->round()->value);

        $decimal = new Decimal(3.55);

        Should::eq(4.00, $decimal->round()->value);

        $decimal = new Decimal(3.49);

        Should::eq(3.00, $decimal->round()->value);
    }
}
