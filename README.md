# Shoe Stores

## An exercise in establishing database relations, 09/30/2016

### By Zach Baum

#### Description

A concept website to show what brands of shoes are being sold in what stores. 

#### Installation

1. Clone or download files from github.
2. Install Composer if you haven't already, then open the terminal in "/shoe-store" and run the "composer install" command to load frameworks.
3. Open terminal in "/shoe_store/web" and run the command "php -S localhost:8000".
4. Open the internet browser of your choice and go to "localhost:8000/".

#### Specs

Input: 
Output: 


#### Support and contact details

zacharybaum42@gmail.com

#### Technologies Used

PHP, Silex, Twig, PHPUnit, Bootstrap, Mysql, MAMP

#### SQL Commands:
~~~
CREATE DATABASE shoes;
USE shoes;
CREATE TABLE stores (id serial PRIMARY KEY, name varchar (255));
CREATE TABLE brands (id serial PRIMARY KEY, name varchar (255));
CREATE TABLE brands_stores (id serial PRIMARY KEY, brand_id int, store_id int);
CREATE DATABASE shoes_test;
USE shoes_test;
CREATE TABLE stores (id serial PRIMARY KEY, name varchar (255));
CREATE TABLE brands (id serial PRIMARY KEY, name varchar (255));
CREATE TABLE brands_stores (id serial PRIMARY KEY, brand_id int, store_id int);
~~~

License
*Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.*

Copyright (c) 2016 Zachary Baum
