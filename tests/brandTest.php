<?php
    /**
    * @backupGlobals disabled
    * @backupStaticAttributes disabled
    */

    require_once "src/Brand.php";
    require_once "src/Store.php";

    $server = 'mysql:host=localhost:3307;dbname=shoes_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class BrandTest extends PHPUnit_Framework_TestCase
    {
        protected function tearDown()
        {
            Brand::deleteAll();
            Store::deleteAll();
        }

        function test_save()
        {
            // Arrange
            $name = "timberland";
            $test_brand = new Brand($name);

            // Act
            $test_brand->save();

            // Assert
            $this->assertEquals([$test_brand], Brand::getAll());
        }

        function test_getAll()
        {
            // Arrange
            $name = "timberland";
            $test_brand = new Brand($name);
            $test_brand->save();

            $name2 = "nike";
            $test_brand2 = new Brand($name2);
            $test_brand2->save();

            // Act
            $result = Brand::getAll();

            // Assert
            $this->assertEquals([$test_brand, $test_brand2], $result);
        }

        function test_deleteAll()
        {
            // Arrange
            $name = "timberland";
            $test_brand = new Brand($name);
            $test_brand->save();

            $name2 = "nike";
            $test_brand2 = new Brand($name2);
            $test_brand2->save();

            // Act
            Brand::deleteAll();

            // Assert
            $this->assertEquals([], Brand::getAll());
        }

        function test_find()
        {
            // Arrange
            $name = "timberland";
            $test_brand = new Brand($name);
            $test_brand->save();

            $name2 = "nike";
            $test_brand2 = new Brand($name2);
            $test_brand2->save();

            // Act
            $result = Brand::find($test_brand2->getId());

            // Assert
            $this->assertEquals($test_brand2, $result);
        }

        function test_addStore()
        {
            // Arrange
            $name = "timberland";
            $test_brand = new Brand($name);
            $test_brand->save();

            $sName = "DSW";
            $test_store = new Store($sName);
            $test_store->save();

            // Act
            $test_brand->addStore($test_store);

            // Assert
            $this->assertEquals([$test_store], $test_brand->getStores());
        }

        function test_getStores()
        {
            // Arrange
            $name = "timberland";
            $test_brand = new Brand($name);
            $test_brand->save();

            $sName = "DSW";
            $test_store = new Store($sName);
            $test_store->save();
            $test_brand->addStore($test_store);

            $sName2 = "DSW";
            $test_store2 = new Store($sName2);
            $test_store2->save();
            $test_brand->addStore($test_store2);

            // Act
            $result = $test_brand->getStores();

            // Assert
            $this->assertEquals([$test_store, $test_store2], $result);
        }
    }
 ?>
