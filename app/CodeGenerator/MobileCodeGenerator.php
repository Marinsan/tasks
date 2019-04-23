<?php

namespace App\CodeGenerator;


use Faker\Factory;

class MobileCodeGenerator
{

    public static function generate()
    {
        $faker = Factory::create();
        return $faker->numberBetween($min = 000000, $max = 999999);
    }

}