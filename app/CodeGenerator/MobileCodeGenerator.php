<?php

namespace App\CodeGenerator;



class MobileCodeGenerator
{

    public static function generate()
    {
        $code = random_int(100000, 999999);
        return $code;
    }

}
