<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Client.php';

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class ClientTest extends PHPUnit_Framework_TestCase
    {
        function testGetClientName()
        {
            //Arrange
            $client_name = 'Julie';
            $phone_number = '555.555.5555';
            $test_client = new Client($client_name, $phone_number);

            //Act
            $result = $test_client->getClientName();

            //Assert
            $this->assertEquals($client_name, $result);
        }

        function testSetClientName()
        {
            //Arrange
            $client_name = 'Julie';
            $phone_number = '555.555.5555';
            $test_client = new Client($client_name, $phone_number);
            $new_client_name = 'Felicia';

            //Act
            $test_client->setClientName($new_client_name);
            $result = $test_client->getClientName();

            //Assert
            $this->assertEquals('Felicia', $result);
        }

        function testGetPhoneNumber()
        {
            //Arrange
            $client_name = 'Julie';
            $phone_number = '555.555.5555';
            $test_client = new Client($client_name, $phone_number);

            //Act
            $result = $test_client->getPhoneNumber();

            //Assert
            $this->assertEquals($phone_number, $result);
        }

        function testSetPhoneNumber()
        {
            //Arrange
            $client_name = 'Julie';
            $phone_number = '555.555.5555';
            $test_client = new Client($client_name, $phone_number);
            $new_phone_number = '333.333.3333';

            //Act
            $test_client->setPhoneNumber($new_phone_number);
            $result = $test_client->getPhoneNumber();

            //Assert
            $this->assertEquals('333.333.3333', $result);
        }

    }
?>
