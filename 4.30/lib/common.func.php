<?php
header ( "Content-Type: text/html; charset=UTF-8" );

function alertMes($mes,$url) {
    echo "<script>alert('{$mes}');</script>";
    echo "<script>window.location='{$url}';</script>";
}

function verifyEmailFormat($email){
    $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
    if ( preg_match( $pattern, $email ) )
    {
        return true;
    }
    else
    {
        return false;
    }
}