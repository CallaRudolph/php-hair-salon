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
        protected function tearDown()
        {
            Client::deleteAll();
        }

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

        function testSave()
        {
            //Arrange
            $client_name = 'Julie';
            $phone_number = '555.555.5555';
            $test_client = new Client($client_name, $phone_number);

            //Act
            $executed = $test_client->save();

            //Assert
            $this->assertTrue($executed, 'The client was not successfully saved to the database');
        }

        function testGetId()
        {
            //Arrange
            $client_name = 'Julie';
            $phone_number = '555.555.5555';
            $test_client = new Client($client_name, $phone_number);
            $executed = $test_client->save();

            //Act
            $result = $test_client->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function testGetAll()
        {
            //Arrange
            $client_name = 'Julie';
            $phone_number = '555.555.5555';
            $test_client = new Client($client_name, $phone_number);
            $test_client->save();

            $client_name_2 = 'Felicia';
            $phone_number_2 = '333.333.3333';
            $test_client_2 = new Client($client_name_2, $phone_number_2);
            $test_client_2->save();

            //Act
            $result = Client::getAll();

            //Assert
            $this->assertEquals([$test_client, $test_client_2], $result);
        }

        function testDeleteAll()
        {
            //Arrange
            $client_name = 'Julie';
            $phone_number = '555.555.5555';
            $test_client = new Client($client_name, $phone_number);
            $test_client->save();

            $client_name_2 = 'Felicia';
            $phone_number_2 = '333.333.3333';
            $test_client_2 = new Client($client_name_2, $phone_number_2);
            $test_client_2->save();

            //Act
            Client::deleteAll();

            //Assert
            $result = Client::getAll();
            $this->assertEquals([], $result);
        }

        function testFind()
        {
            //Arrange
            $client_name = 'Julie';
            $phone_number = '555.555.5555';
            $test_client = new Client($client_name, $phone_number);
            $test_client->save();

            $client_name_2 = 'Felicia';
            $phone_number_2 = '333.333.3333';
            $test_client_2 = new Client($client_name_2, $phone_number_2);
            $test_client_2->save();

            //Act
            $result = Client::find($test_client->getId());

            //Assert
            $this->assertEquals($test_client, $result);
        }

        function testUpdateName()
        {
            //Arrange
            $client_name = 'Julie';
            $phone_number = '555.555.5555';
            $test_client = new Client($client_name, $phone_number);
            $test_client->save();

            $new_client_name = 'Felicia';

            //Act
            $test_client->updateName($new_client_name);

            //Assert
            $this->assertEquals('Felicia', $test_client->getClientName());
        }

        function testUpdatePhoneNumber()
        {
            //Arrange
            $client_name = 'Julie';
            $phone_number = '555.555.5555';
            $test_client = new Client($client_name, $phone_number);
            $test_client->save();

            $new_phone_number = '333.333.3333';

            //Act
            $test_client->updatePhoneNumber($new_phone_number);

            //Assert
            $this->assertEquals('333.333.3333', $test_client->getPhoneNumber());
        }

        function testDelete()
        {
            //Arrange
            $client_name = 'Julie';
            $phone_number = '555.555.5555';
            $test_client = new Client($client_name, $phone_number);
            $test_client->save();

            $client_name_2 = 'Felicia';
            $phone_number_2 = '333.333.3333';
            $test_client_2 = new Client($client_name_2, $phone_number_2);
            $test_client_2->save();

            //Act
            $test_client->delete();

            //Assert
            $this->assertEquals([$test_client_2], Client::getAll());
        }
    }
?>
