# Gozpeak Website

Gozpeak Repo for demo.gozpeak.com development

<b>
The goal of Gozpeak Project : 
</b>

Gozpeak is a concept to speak languages ('go speak'). 
If you need to speak/improve some languages, so Gozpeak is made for you ! 
Through the website, users will be able to propose some activities, grouped by categories (sport, eat, art and party). 
One or more languages could be associated to each event. 

In this way, people could speak a lot of different languages, increase their language skills, improve their accents, etc...  just by practicing some social things ... and especially by meeting native people !!! 

<br>
## Install Gozpeak Dev Environment 

#### Install packages

Apache2, PHP and MySQL are the main middlewares required for Gozpeak : 

```
apt-get update
apt-get install apache2 libapache2-mod-php5 php5-mysql mysql-server
```

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


<br>
#### Optionnal settings

Enventually, to manage sessions, Redis can be installed, and then configured in   <i> /etc/php5/apache2/php.ini  </i> : 

```bash
apt-get install redis php5-redis
```

Lines to be configured in php.ini : 
```
session.save_handler = redis
session.save_path = "tcp://127.0.0.1:6379?auth=<AUTH_TOKEN>"
```

The session.save_path can use a token or not, but if yes, you need to configure   <i> /etc/redis/redis.conf </i> : 

<code> requirepass 'AUTH_TOKEN' </code>

Restart Redis : 

<code> service redis-server restart </code>
