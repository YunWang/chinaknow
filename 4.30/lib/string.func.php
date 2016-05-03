<?php

function buildRandomString($type = 1, $length = 4)
{
    // $type = 1;
    // $length=4;
    if ($type == 1) {
        $chars = join("", range(0, 9));
    } elseif ($type == 2) {
        $chars = join("", array_merge(range("a", "z"), range("A", "Z")));
    } elseif ($type == 3) {
        $chars = join("", array_merge(range("a", "z"), range("A", "Z"), range(0, 9)));
    }
    
    if ($length > strlen($chars)) {
        exit("字符串长度不够！");
    }
    
    $chars = str_shuffle($chars);
    return substr($chars, 0, $length);
}

/**
 * 生成唯一字符串
 * @param unknown $param
 * @return string
 */
function getUniString($param) {
    return md5(uniqid(microtime(true),true));
}

/**
 * 得到文件扩展名
 * @param string $filename
 * @return string
 */
function getExt($filename){
    return strtolower(end(explode(".", $filename)));
}

/**
 * 得到文件扩展名
 * @param string $filename
 * @return string
 */
function fileext($filename)
{
    return substr(strrchr($filename, '.'), 1);
}

/**、
 * 得到随机文件名
 * @param int $length
 * @return string
 */
function random($length)
{
    $hash = 'CR-';
    $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
    $max = strlen($chars) - 1;
    mt_srand((double) microtime() * 1000000);
    for ($i = 0; $i < $length; $i ++) {
        $hash .= $chars[mt_rand(0, $max)];
    }
    return $hash;
}
