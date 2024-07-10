<?php
function main(array $args) : array {
    // Public FTP server for testing
    // https://dlptest.com/ftp-test/
    
    $ftp_server = "ftp.dlptest.com";
    $ftp_conn = ftp_connect($ftp_server) or die("Could not connect to $ftp_server");
    $login = @ftp_login($ftp_conn, "dlpuser", "rNrKYTX9g7z3RgJRmxWuGHbeu");

    if ($login) {
        error_log("Connected to $ftp_server");
        return ["body" => "Connected to $ftp_server"];
    } else {
        error_log("Could not connect to $ftp_server");
        return ["body" => "Could not connect to $ftp_server"];
    }

    ftp_close($ftp_conn);
}