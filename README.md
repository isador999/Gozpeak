# Gozpeak Website
Gozpeak Repo for demo.gozpeak.com development

<br>
<br>
## Initialization 

#### Clone files

Clone firstly the repository in an Apache/Nginx Vhost : 

```
cd /var/www/
git clone https://github.com/isador999/gozpeak/
```


#### MySQL 

Then, to import the database, enter the following commands : 

Connect in root to MySQL : 

<code> mysql -u root -p </code>

Create database, for example 'gozpeak_dev' : 

<code> mysql> create database gozpeak_dev; </code>

Give rights to specific user on this database : 

<code> mysql> grant all privileges on gozpeak_dev_user.* to 'gozpeak_dev'@'localhost' IDENTIFIED BY 'gozpeak_dev_password';</code>

Exit MySQL prompt : 

<code> mysql> exit;  </code>

<br>

Now, you can import the datafile  <i>  gozpeak/gozpeak_dev.sql  </i> in your database : 

```
cd /var/www/gozpeak/
mysql -u gozpeak_demo -p  gozpeak_demo < gozpeak_dev.sql 
```

The password will be asked to import. 



<br>
#### Connection File 

Finally, replace credentials in the first line of  <i> gozpeak/models/dbconnect.php </i>   file : 

```php
<?php 
    try{ 
	    $DB = new PDO('mysql:host=YOUR_MYSQL_HOST;dbname=YOUR_DBNAME', 'YOUR_USER', 'YOUR_PASSWORD'); 
        $DB->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	    $DB->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  
	    $DB->exec("SET CHARACTER SET utf8");
    } catch (PDOException $e) {
        echo $e->getMessage();
        die();
    } 
?>
```

Ok !  Eventually map Apache configuration to the gozpeak folder, restart apache service...  and enjoy ;-)  

Go to <b> http://localhost:[custom_port]/index.php </b>

