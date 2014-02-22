<?php

/*
 * Автор: dredei
 * Сайт: http://www.softez.pp.ua/
 */

function makeCorrectJSONForProg( $folders )
{
    $obj = array();
    $obj[ 'Author' ] = "dredei";
    $obj[ 'Site' ] = "http://www.softez.pp.ua/";
    $obj[ 'Version' ] = 100;
    $i = 0;
    foreach ( $folders[ 'Folders' ] as $key => $value )
    {
        $obj[ 'Folders' ][ $i ][ 'Name' ] = $value->{ 'Name' };
        $j = 0;
        foreach ( $value->{ 'Tasks' } as $keyT => $valueT )
        {
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'allowProxy' ] = $valueT->{ 'Allow proxy' };
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'ignoreGU' ] = $valueT->{ 'Ignore GU' };
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'rangeSize' ] = $valueT->{ 'Range size' };
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'mask' ] = $valueT->{ 'Mask' };
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'uniquePeriod' ] = $valueT->{ 'Unique period' };
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'name' ] = $valueT->{ 'Name' };
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'domain' ] = $valueT->{ 'Domain' };
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'extSource' ] = $valueT->{ 'Ext source' };
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'beforeClick' ] = $valueT->{ 'Before click' };
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'afterClick' ] = $valueT->{ 'After click' };
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'growth' ] = $valueT->{ 'Growth' };
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'days' ] = $valueT->{ 'Days' };
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'listId' ] = $valueT->{ 'List ID' };
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'listMode' ] = $valueT->{ 'List mode' };
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'profile' ] = $valueT->{ 'Profile' };
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'frozen' ] = $valueT->{ 'Frozen' };
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'DayTargeting' ] = $valueT->{ 'Day targeting' };
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'GeoTargeting' ] = $valueT->{ 'Geo targeting' };
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'WeekTargeting' ] = $valueT->{ 'Week targeting' };
            $obj[ 'Folders' ][ $i ][ 'Tasks' ][ $j ][ 'TimeDistribution' ] = $valueT->{ 'Time distribution' };
            $j++;
        }
        $i++;
    }
    return $obj;
}
