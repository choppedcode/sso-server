# Single Sign On server

Single Sign On allows a user to only sign in once and be signed in automatically across different systems.

Currently supported systems include:
* [Wordpress](http://wordpress.org/plugins/single-sign-on/)
* [WHMCS](https://github.com/choppedcode/sso-whmcs)

The plugin works over multiple instances of the same system, for example multiple Wordpress installations as well as between systems, for example between WHMCS and Wordpress.

Additional systems can be added.

The way it works is that the participating systems interact with a SSO server and using cross domain messaging techniques, the user can login to one system and automatically get logged in to the other participating sytems.

## Installation

Install the code in a web server so it's accessible via the net.

Create a database and create the table connections using the following SQL statement:

```php
CREATE TABLE IF NOT EXISTS `connections` (
  `hash` varchar(64) NOT NULL,
  `cookie` varchar(64) NOT NULL,
  `loggedin` varchar(1) NOT NULL,
  `email` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
```

Create a file config.php in the root folder and add the following:

```php
$conf['db']['hostSpec']='localhost'; //host name
$conf['db']['dbName']=''; // database name
$conf['db']['dbUser']=''; // database user
$conf['db']['dbPass']=''; // database password
```

## Changelog

### 1.0.2
* Updated documentation to include database creation instructions

### 1.0.1
* Beta release

### 1.0.0
* Alpha release