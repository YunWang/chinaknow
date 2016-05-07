<?php
    include_once("./class.config.php");
    include_once("include/DB.class.php");


    //PHP数组传递给JavaScript以及json_encode的gbk中文乱码的解决
    /**************************************************************
     *
    *    使用特定function对数组中所有元素做处理
    *    @param    string    &$array        要处理的字符串
    *    @param    string    $function    要执行的函数
    *    @return boolean    $apply_to_keys_also        是否也应用到key上
    *    @access public
    *
    *************************************************************/
    function arrayRecursive(&$array, $function, $apply_to_keys_also = false)
    {
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                arrayRecursive($array[$key], $function, $apply_to_keys_also);
            } else {
                $array[$key] = $function($value);
            }
    
            if ($apply_to_keys_also && is_string($key)) {
                $new_key = $function($key);
                if ($new_key != $key) {
                    $array[$new_key] = $array[$key];
                    unset($array[$key]);
                }
            }
        }
    }
    
    /**************************************************************
     *
    *    将数组转换为JSON字符串（兼容中文）
    *    @param    array    $array        要转换的数组
    *    @return string        转换得到的json字符串
    *    @access public
    *
    *************************************************************/
    function JSON($array) {
        arrayRecursive($array, 'urlencode', true);
        $json = json_encode($array);
        return urldecode($json);
    }

    $test = $db->Select("test");
    //构建JSON串
    $jstr='[';
    while($rs = $test->Fetch())
    {
        $nick = iconv("GBK",'utf-8',$rs['nick']);/*转换为utf-8编码*/
        $jstr=$jstr.'{"name":"'.$rs['name'].'","nick":"'.$nick.'"},';
    }
    $jstr=substr($jstr,0,strlen($jstr)-1);
    $jstr=$jstr.']';
    echo "getProfile('$jstr')";
?>