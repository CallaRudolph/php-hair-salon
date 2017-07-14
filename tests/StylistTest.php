<?php

    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once 'src/Stylist.php';

    $server = 'mysql:host=localhost:8889;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);


    class StylistTest extends PHPUnit_Framework_TestCase
    {
        function testGetName()
        {
            //Arrange
            $name = 'Becky';
            $test_stylist = new Stylist ($name);

            //Act
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals($name, $result);
        }

        function testSetName()
        {
            //Arrange
            $name = 'Becky';
            $test_stylist = new Stylist($name);
            $new_name = 'Alicia';

            //Act
            $test_stylist->setName($new_name);
            $result = $test_stylist->getName();

            //Assert
            $this->assertEquals('Alicia', $result);
        }

        function testSave()
        {
            //Arrange
            $name = 'Becky';
            $test_stylist = new Stylist($name);

            //Act
            $executed = $test_stylist->save();

            //Assert
            $this->assertTrue($executed, 'The stylist was not successfully saved to the database');
        }
    }
?>
