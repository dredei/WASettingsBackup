<?php

require_once 'webdav_client.class.php';

class YandexDisk
{

    protected $wdc;

    function login( $login, $password )
    {
        $this->wdc = new webdav_client();
        $this->wdc->set_server( 'ssl://webdav.yandex.ru' );
        $this->wdc->set_port( 443 );
        $this->wdc->set_user( $login );
        $this->wdc->set_pass( $password );
        // use HTTP/1.1
        $this->wdc->set_protocol( 1 );
        // enable debugging
        $this->wdc->set_debug( false );

        if ( !$this->wdc->open() )
        {
            print 'Error: could not open server connection <br /> \r\n';
            exit;
        }

        // check if server supports webdav rfc 2518
        if ( !$this->wdc->check_webdav() )
        {
            print 'Error: server does not support webdav or user/password may be wrong <br /> \r\n';
            exit;
        }
    }

    function makeDir( $name )
    {
        $http_status = $this->wdc->mkcol( "/".$name );
    }

    function uploadFile( $diskPath, $filePath )
    {
        $http_status = $this->wdc->put_file( $diskPath, $filePath );
    }

    function close()
    {
        $this->wdc->close();
    }

}
