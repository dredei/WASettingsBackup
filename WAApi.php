<?php

class WAApi
{

    function getJSONstr( $str )
    {
        preg_match_all( "/'(.*)'/", $str, $matches );
        $result = $matches[ 1 ][ 0 ];
        return $result;
    }

    function post( $js )
    {
        $url = 'http://api.waspace.net/';
        $ch = curl_init( $url );
        curl_setopt( $ch, CURLOPT_POST, 1 );
        curl_setopt( $ch, CURLOPT_POSTFIELDS, 'v='.$js );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        $response = curl_exec( $ch );
        curl_close( $ch );
        $json_str = urldecode( $this->getJSONstr( $response ) );
        return $json_str;
    }

    function login( $mail, $pass )
    {
        $query = array( 'Action' => 'Sign in', 'Data' => array( 'Mail' => $mail,
                'Password' => $pass ) );
        $json = json_encode( $query );
        $result = $this->post( $json );
        $json_str = json_decode( $result );
        if ( isset( $json_str->{'Error'} ) )
        {
            $token[ 'Error' ] = $json_str->{'Error'};
        }
        else
        {
            $token[ 'Token' ] = $json_str->{'Data'}->{'Token'};
        }
        return $token;
    }

    function getAll( $mail, $pass )
    {
        $token = $this->login( $mail, $pass );
        if ( isset( $token[ 'Error' ] ) )
        {
            return $token[ 'Error' ];
        }
        $query = array( 'Action' => 'Get all', 'Data' => array( 'Token' => $token[ 'Token' ] ) );
        $json = json_encode( $query );
        $result = $this->post( $json );
        $json_str = json_decode( $result );
        if ( isset( $json_str->{'Error'} ) )
        {
            $folders[ 'Error' ] = $json_str->{'Error'};
        }
        else
        {
            $folders[ 'Folders' ] = $json_str->{'Data'}->{'Folders'};
        }
        $query = array( 'Action' => 'Sign out', 'Data' => array( 'Token' => $token[ 'Token' ] ) );
        $json = json_encode( $query );
        $result = $this->post( $json );
        return $folders;
    }

}
?>