# codeigniter-login-logout-register-ceate/edit/delete tasks
A user login, logout, register, create/edit/delete tasks in Codeigniter 3

## Installation
1. Open /application/config/config.php and edit with your base url ($config['base_url'])
2. Open /application/config/database.php and edit with your database settings
3. On your database, open a SQL terminal paste this and execute: (sample database in the folder 'database_backup' :- user: name, password: name@gmail.com)

```sql
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(255) NOT NULL DEFAULT '',
  `avatar` varchar(255) DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_admin` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_confirmed` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
);
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned DEFAULT 0 NOT NULL,
  `data` blob NOT NULL,
  PRIMARY KEY (id),
  KEY `ci_sessions_timestamp` (`timestamp`)
);
CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(150) NOT NULL,
  `dateCreated` datetime NOT NULL,
  `dateUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (id)
);
```
Go to http://<siteurl>/register and create a user

## Usage
It is just a starter for user login logout register create/edit/delete task functionalities.

Extend the user controller or keep it as it is and write your own application with Codeigniter.
