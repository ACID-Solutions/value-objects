<?php

use AcidSolutions\ValueObjects\Classes\String;
use Way\Tests\Should;

/**
 * StringTest
 **/
class StringTest extends PHPUnit_Framework_TestCase
{
    public function test_string_can_be_instantiate()
    {
        $s = new String;
    }

    public function test_ascii()
    {
        $string = new String("bisouséà");

        Should::eq('bisousea', $string->ascii()->value);
    }

    public function test_camel()
    {
        $string = new String('camel_case');

        Should::eq('camelCase', $string->camel()->value);
    }

    public function test_contains()
    {
        $string = new String('my sock in a box');

        Should::eq(true, $string->contains('sock'));
        Should::eq(false, $string->contains('SOCK'));
        Should::eq(true, $string->contains(['sock', 'box']));
        Should::eq(true, $string->contains(['cock', 'sock']));
    }

    public function test_ends_with()
    {
        $string = new String('Bisous toussa');

        Should::eq(true, $string->endsWith('ssa'));
        Should::eq(false, $string->endsWith('SSA'));
    }

    public function test_finish()
    {
        $string = new String('my dock in a fog');

        Should::eq('my dock in a fog trully.', $string->finish(' trully.')->value);
    }

    public function test_is_pattern()
    {
        $string = new String('My event is bigger than you');

        Should::eq(true, $string->is("My event is bigger than *"));
    }

    public function test_length()
    {
        $string = new String('toussa');

        Should::eq(6, $string->length());
        $string = new String('toussa ');
        Should::eq(7, $string->length());
    }

    public function test_limit()
    {
        $string = new String('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

        Should::eq('Lorem ipsum...', $string->limit(11)->value);
    }

    public function test_lower()
    {
        $string = new String('IT IS HIGH');

        Should::eq('it is high', $string->lower()->value);
    }

    public function test_words()
    {
        $string = new String('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');

        Should::eq('Lorem ipsum dolor sit...', $string->words(4)->value);
    }

    public function test_random()
    {
        $string = new String();

        $rand1 = $string->random()->value;
        $rand2 = $string->random()->value;
        $rand3 = $string->random()->value;

        Should::eq(true, $rand1 !== $rand2);
        Should::eq(true, $rand2 !== $rand3);
        Should::eq(true, $rand1 !== $rand3);
    }

    public function test_quickrandom()
    {
        $string = new String();

        $rand1 = $string->quickRandom()->value;
        $rand2 = $string->quickRandom()->value;
        $rand3 = $string->quickRandom()->value;

        Should::eq(true, $rand1 !== $rand2);
        Should::eq(true, $rand2 !== $rand3);
        Should::eq(true, $rand1 !== $rand3);
    }

    public function test_upper()
    {
        $string = new String('to upper');

        Should::eq('TO UPPER', $string->upper()->value);
    }

    public function test_title()
    {
        $string = new String("it's a fucking cool title isn't it?");

        Should::eq("It's A Fucking Cool Title Isn't It?", $string->title()->value);
    }

    public function test_slug()
    {
        $string = new String("it's fucking cool");

        Should::eq("its-fucking-cool", $string->slug()->value);
    }

    public function test_snake()
    {
        $string = new String("ItsFuckingCool");

        Should::eq("its_fucking_cool", $string->snake()->value);
    }

    public function test_starts_with()
    {
        $string = new String('its fucking cool');

        Should::eq(true, $string->startsWith('its'));
    }

    public function test_studly()
    {
        $string = new String('its fucking cool');

        Should::eq('ItsFuckingCool', $string->studly()->value);
    }

    public function test_to_array()
    {
        $string = new String('Toussa');

        Should::eq('Toussa', $string->toArray());
    }

    public function test_to_json()
    {
        $string = new String('Toussa');

        Should::eq('"Toussa"', $string->toJson());
    }

    public function test__get()
    {
        $string = new String('tttt');

        Should::eq('tttt', $string->value);
        Should::eq(null, $string->value2);
    }

    public function test_to_string()
    {
        $string = new String('testing toString');

        Should::eq('testing toString', (string)$string);
    }
}
