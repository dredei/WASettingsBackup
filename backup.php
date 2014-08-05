<?php

/*
 * Автор: dredei
 * Сайт: http://www.softez.pp.ua/
 */

error_reporting( 0 );
require_once 'WAApi.php';
require_once 'yandexDisk.php';
require_once 'funcs.php';
require_once 'config.php';
global $config;

$loginsPass = file( "walogins.txt" );
mkdir( "backups" );
$api = new WAApi();
$yadisk = new YandexDisk();
$yadisk->login( $config[ 'ya_login' ], $config[ 'ya_password' ] );
$yadisk->makeDir( $config[ 'ya_backups_dir' ] );
foreach ( $loginsPass as $logPass )
{
    $logPass = str_replace( "\r\n", '', $logPass );
    $logPass = str_replace( "\n", '', $logPass );
    if ( preg_match_all( "/([^;]*);([^;]*)/", $logPass, $matches ) )
    {
        $login = $matches[ 1 ][ 0 ];
        $password = $matches[ 2 ][ 0 ];
        $folders = $api->getAll( $login, $password );
        $obj = makeCorrectJSONForProg( $folders );
        $foldersStrJson = json_encode( $obj );
        $fileName = substr( $login, 0, strpos( $login, "@" ) ) . ".txt";
        file_put_contents( "backups/" . $fileName, $foldersStrJson );
        $yadisk->removeFile( $config[ 'ya_backups_dir' ] . $fileName );
        $yadisk->uploadFile( $config[ 'ya_backups_dir' ] . $fileName, "backups/" . $fileName );
    }
}
$yadisk->close();

