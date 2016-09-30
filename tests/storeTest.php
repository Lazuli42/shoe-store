<?php
/**
* @backupGlobals disabled
* @backupStaticAttributes disabled
*/

    require_once "src/Store.php";
    require_once "src/Brand.php";

    $server = 'mysql:host=localhost:3307;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StoreTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Store::deleteAll();
        }

        function test_save()
        {
            // Arrange
            $name = "DSW";
            $test_store = new Store($name);

            // Act
            $test_store->save();

            // Assert
            $this->assertEquals([$test_store], Store::getAll());
        }

        function test_getAll()
        {
            // Arrange
            $name = "DSW";
            $test_store = new Store($name);
            $test_store->save();

            $name2 = "Famous Footwear";
            $test_store2 = new Store($name2);
            $test_store2->save();

            // Act
            $result = Store::getAll();

            // Assert
            $this->assertEquals([$test_store, $test_store2], $result);
        }

        function test_deleteAll()
        {
            // Arrange
            $name = "DSW";
            $test_store = new Store($name);
            $test_store->save();

            $name2 = "Famous Footwear";
            $test_store2 = new Store($name2);
            $test_store2->save();

            // Act
            Store::deleteAll();

            // Assert
            $this->assertEquals([], Store::getAll());
        }
    }
 ?>
