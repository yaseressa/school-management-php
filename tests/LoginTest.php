<?php

declare(strict_types=1);
class LoginTest extends \PHPUnit\Framework\TestCase
{

    public function testAdminLogin()
    {
        $Amail = "admin";
        $Apass = "admin";
        $conn = mysqli_connect('localhost:3306', 'uni', 'phpmysql', 'sms') or die('NO ANSWER FROM THE BACK.');
        $query = mysqli_fetch_assoc(mysqli_query($conn, "select * from admin where email = '" . $Amail . "' AND " . "password = '" . $Apass . "'"));
        $this->assertEquals("admin", $query['email']);
    }
}
