<?php
define('HOST', 'localhost');
define('DATABASE', 'webtour');
define('USERNAME', 'root');
define('PASSWORD', '');

function execute($sql)
{

    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');

    mysqli_query($conn, $sql);

    mysqli_close($conn);
}

function executeResult($sql, $isSingle = false)
{
    $data = null;

    $conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
    mysqli_set_charset($conn, 'utf8');

    $resultset = mysqli_query($conn, $sql);
    if ($isSingle) {
        $data = mysqli_fetch_array($resultset);
    } else {
        $data = [];
        while (($row = mysqli_fetch_array($resultset)) != null) {
            $data[] = $row;
        }
    }

    mysqli_close($conn);

    return $data;
}
