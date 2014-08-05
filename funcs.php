<?php

/*
 * Автор: dredei
 * Сайт: http://www.softez.pp.ua/
 */

function makeCorrectJSONForProg( $folders, $login )
{
    $obj = array();
    $obj[ 'Author' ] = "dredei";
    $obj[ 'Site' ] = "http://www.softez.pp.ua/";
    $obj[ 'Version' ] = "1.0.1";
    $obj[ 'Folders' ] = $folders[ 'Folders' ];
    $obj[ 'Email' ] = $login;
    return $obj;
}
