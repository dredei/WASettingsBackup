<?php

require_once 'WAApi.php';
require_once 'yandexDisk.php';
$loginsPass = file( "walogins.txt" );
mkdir( "backups" );
$api = new WAApi();
foreach ( $loginsPass as $logPass )
{
    if ( preg_match_all( "/([^;]*);([^;]*)/", $logPass, $matches ) )
    {
        $login = $matches[ 1 ][ 0 ];
        $password = $matches[ 2 ][ 0 ];
        $folders = $api->getAll( $login, $password );
        $foldersStrJson = json_encode( $folders );
        file_put_contents( "softez.txt", $foldersStrJson );
        //print $login." ".$password."<br>";
    }
}

