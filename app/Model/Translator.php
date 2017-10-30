<?php
/**
 * This <laravel-5-0> project created by :
 * Name         : syafiq
 * Date / Time  : 30 October 2017, 4:11 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

namespace App\Model;


use PhpSpec\Exception\Fracture\InterfaceNotImplementedException;

/**
 * Trait Translator
 * @package App\Model
 */
trait Translator
{
    /**
     * @param $value
     * @throws InterfaceNotImplementedException
     */
    public static function decode(
        /** @noinspection PhpUnusedParameterInspection */
        $value)
    {
        throw new InterfaceNotImplementedException('Must Implemented', null, null);
    }

    /**
     * @return mixed
     */
    public abstract function encode();
}

?>
