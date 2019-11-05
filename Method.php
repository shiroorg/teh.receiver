<?php
/**
 * Created by PhpStorm.
 * User: shiroorg
 * Date: 05.11.19
 * Time: 13:38
 */

namespace Billing;


class Receiver
{
    // Константы которые при необходимости можно заменить
    const PATTERN_YANDEX_WALLET = '/(41\d{9,12})/';
    const PATTERN_AMOUNT        = '/(\d+([.,](\d{1,2}))?)([р(уб),r(ub)])/';
    const PATTERN_CODE          = '/[\s]+(\d{4,8})(?![\d.,])/um';

    /***
     * Разбирает полученую строку от ресивера
     * @param string $str
     * @return array
     */
    public static function parser($str) {

        $patterns = array(
            'wallet' => self::PATTERN_YANDEX_WALLET,
            'amount' => self::PATTERN_AMOUNT,
            'code'   => self::PATTERN_CODE,
        );

        $result = [];
        foreach ($patterns as $k => $pattern) {
            if (preg_match($pattern, $str, $matches) && isset($matches[1])) {
                $result[$k] = $matches[1];
            }
        }

        return $result;
    }
}