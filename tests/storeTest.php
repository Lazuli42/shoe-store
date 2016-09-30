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
            Brand::deleteAll();
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

        function test_find()
        {
            // Arrange
            $name = "DSW";
            $test_store = new Store($name);
            $test_store->save();

            $name2 = "Famous Footwear";
            $test_store2 = new Store($name2);
            $test_store2->save();

            // Act
            $result = Store::find($test_store2->getId());

            // Assert
            $this->assertEquals($test_store2, $result);
        }

        function test_addBrand()
        {
            // Arrange
            $name = "DSW";
            $test_store = new Store($name);
            $test_store->save();

            $bName = "timberland";
            $test_brand = new Brand($bName);
            $test_brand->save();

            // Act
            $test_store->addBrand($test_brand);

            // Assert
            $this->assertEquals([$test_brand], $test_store->getBrands());
        }

        function test_getBrands()
        {
            // Arrange
            $name = "DSW";
            $test_store = new Store($name);
            $test_store->save();

            $bName = "timberland";
            $test_brand = new Brand($bName);
            $test_brand->save();
            $test_store->addBrand($test_brand);

            $bName2 = "nike";
            $test_brand2 = new Brand($bName2);
            $test_brand2->save();
            $test_store->addBrand($test_brand2);

            // Act
            $result = $test_store->getBrands();

            // Assert
            $this->assertEquals([$test_brand, $test_brand2], $result);
        }

        function test_update()
        {
            // Arrange
            $name = "DSW";
            $test_store = new Store($name);
            $test_store->save();

            // Act
            $test_store->update("Designer Shoe Warehouse");

            // Assert
            $this->assertEquals("Designer Shoe Warehouse", $test_store->getName());
        }

        function test_delete()
        {
            // Arrange
            $name = "DSW";
            $test_store = new Store($name);
            $test_store->save();

            $name2 = "Famous Footwear";
            $test_store2 = new Store($name2);
            $test_store2->save();

            // Act
            $test_store->delete();

            // Assert
            $this->assertEquals([$test_store2], Store::getAll());
        }
    }
 ?>
