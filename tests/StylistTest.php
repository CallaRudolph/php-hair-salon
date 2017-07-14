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
        protected function tearDown()
        {
            Stylist::deleteAll();
        }

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

        function testGetId()
        {
            //Arrange
            $name = 'Becky';
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            //Act
            $result = $test_stylist->getId();

            //Assert
            $this->assertEquals(true, is_numeric($result));
        }

        function testGetAll()
        {
            //Arrange
            $name = 'Becky';
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $name_2 = 'Alicia';
            $test_stylist_2 = new Stylist($name_2);
            $test_stylist_2->save();

            //Act
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([$test_stylist, $test_stylist_2], $result);
        }

        function testDeleteAll()
        {
            //Arrange
            $name = 'Becky';
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $name_2 = 'Alicia';
            $test_stylist_2 = new Stylist($name_2);
            $test_stylist_2->save();

            //Act
            Stylist::deleteAll();
            $result = Stylist::getAll();

            //Assert
            $this->assertEquals([], $result);
        }

        function testFind()
        {
            //Arrange
            $name = 'Becky';
            $name_2 = 'Alicia';
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $test_stylist_2 = new Stylist($name_2);
            $test_stylist_2->save();

            //Act
            $result = Stylist::find($test_stylist->getId());

            //Assert
            $this->assertEquals($test_stylist, $result);
        }

        function testUpdate()
        {
            //Arrange
            $name = 'Becky';
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $new_name = 'Alicia';

            //Act
            $test_stylist->update($new_name);

            //Assert
            $this->assertEquals('Alicia', $test_stylist->getName());
        }

        function testDelete()
        {
            //Arrange
            $name = 'Becky';
            $test_stylist = new Stylist($name);
            $test_stylist->save();

            $name_2 = 'Alicia';
            $test_stylist_2 = new Stylist($name_2);
            $test_stylist_2->save();

            //Act
            $test_stylist->delete();

            //Assert
            $this->assertEquals([$test_stylist_2], Stylist::getAll());
        }
    }
?>
