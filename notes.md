## Bricks

### Guess we need to install this

```bash
sudo apt-get install php mysql-server php-mysql
```

### Setting password of `root` for mariadb

```SQL
~/projets/Bricks/bricks                                                                                                                                                                12:26:47
❯ sudo mysql         
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MariaDB connection id is 35
Server version: 10.6.18-MariaDB-0ubuntu0.22.04.1 Ubuntu 22.04

Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

MariaDB [(none)]> CREATE USER 'root'@'localhost' IDENTIFIED BY 'root'
    -> ;
ERROR 1396 (HY000): Operation CREATE USER failed for 'root'@'localhost'
MariaDB [(none)]> CREATE USER 'root'@'localhost' IDENTIFIED BY 'root';
ERROR 1396 (HY000): Operation CREATE USER failed for 'root'@'localhost'
MariaDB [(none)]> .databases;
ERROR 1064 (42000): You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near '.databases' at line 1
MariaDB [(none)]> show databases;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| mysql              |
| performance_schema |
| sys                |
+--------------------+
4 rows in set (0,000 sec)

MariaDB [(none)]> SELECT User FROM mysql.user;
+-------------+
| User        |
+-------------+
| mariadb.sys |
| mysql       |
| root        |
+-------------+
3 rows in set (0,001 sec)

MariaDB [(none)]> describe mysql.user;
+------------------------+---------------------+------+-----+----------+-------+
| Field                  | Type                | Null | Key | Default  | Extra |
+------------------------+---------------------+------+-----+----------+-------+
| Host                   | char(255)           | NO   |     |          |       |
| User                   | char(128)           | NO   |     |          |       |
| Password               | longtext            | YES  |     | NULL     |       |
| Select_priv            | varchar(1)          | YES  |     | NULL     |       |
| Insert_priv            | varchar(1)          | YES  |     | NULL     |       |
| Update_priv            | varchar(1)          | YES  |     | NULL     |       |
| Delete_priv            | varchar(1)          | YES  |     | NULL     |       |
| Create_priv            | varchar(1)          | YES  |     | NULL     |       |
| Drop_priv              | varchar(1)          | YES  |     | NULL     |       |
| Reload_priv            | varchar(1)          | YES  |     | NULL     |       |
| Shutdown_priv          | varchar(1)          | YES  |     | NULL     |       |
| Process_priv           | varchar(1)          | YES  |     | NULL     |       |
| File_priv              | varchar(1)          | YES  |     | NULL     |       |
| Grant_priv             | varchar(1)          | YES  |     | NULL     |       |
| References_priv        | varchar(1)          | YES  |     | NULL     |       |
| Index_priv             | varchar(1)          | YES  |     | NULL     |       |
| Alter_priv             | varchar(1)          | YES  |     | NULL     |       |
| Show_db_priv           | varchar(1)          | YES  |     | NULL     |       |
| Super_priv             | varchar(1)          | YES  |     | NULL     |       |
| Create_tmp_table_priv  | varchar(1)          | YES  |     | NULL     |       |
| Lock_tables_priv       | varchar(1)          | YES  |     | NULL     |       |
| Execute_priv           | varchar(1)          | YES  |     | NULL     |       |
| Repl_slave_priv        | varchar(1)          | YES  |     | NULL     |       |
| Repl_client_priv       | varchar(1)          | YES  |     | NULL     |       |
| Create_view_priv       | varchar(1)          | YES  |     | NULL     |       |
| Show_view_priv         | varchar(1)          | YES  |     | NULL     |       |
| Create_routine_priv    | varchar(1)          | YES  |     | NULL     |       |
| Alter_routine_priv     | varchar(1)          | YES  |     | NULL     |       |
| Create_user_priv       | varchar(1)          | YES  |     | NULL     |       |
| Event_priv             | varchar(1)          | YES  |     | NULL     |       |
| Trigger_priv           | varchar(1)          | YES  |     | NULL     |       |
| Create_tablespace_priv | varchar(1)          | YES  |     | NULL     |       |
| Delete_history_priv    | varchar(1)          | YES  |     | NULL     |       |
| ssl_type               | varchar(9)          | YES  |     | NULL     |       |
| ssl_cipher             | longtext            | NO   |     |          |       |
| x509_issuer            | longtext            | NO   |     |          |       |
| x509_subject           | longtext            | NO   |     |          |       |
| max_questions          | bigint(20) unsigned | NO   |     | 0        |       |
| max_updates            | bigint(20) unsigned | NO   |     | 0        |       |
| max_connections        | bigint(20) unsigned | NO   |     | 0        |       |
| max_user_connections   | bigint(21)          | NO   |     | 0        |       |
| plugin                 | longtext            | NO   |     |          |       |
| authentication_string  | longtext            | NO   |     |          |       |
| password_expired       | varchar(1)          | NO   |     |          |       |
| is_role                | varchar(1)          | YES  |     | NULL     |       |
| default_role           | longtext            | NO   |     |          |       |
| max_statement_time     | decimal(12,6)       | NO   |     | 0.000000 |       |
+------------------------+---------------------+------+-----+----------+-------+
47 rows in set (0,001 sec)

MariaDB [(none)]> SELECT User, HOST, Password FROM mysql.user;
+-------------+-----------+----------+
| User        | Host      | Password |
+-------------+-----------+----------+
| mariadb.sys | localhost |          |
| root        | localhost | invalid  |
| mysql       | localhost | invalid  |
+-------------+-----------+----------+
3 rows in set (0,000 sec)

MariaDB [(none)]> ALTER USER 'root'@'localhost' IDENTIFIED BY 'root';
Query OK, 0 rows affected (0,009 sec)

MariaDB [(none)]> SELECT User, HOST, Password FROM mysql.user;
+-------------+-----------+-------------------------------------------+
| User        | Host      | Password                                  |
+-------------+-----------+-------------------------------------------+
| mariadb.sys | localhost |                                           |
| root        | localhost | *81F5E21E35407D884A6CD4A731AEBFB6AF209E1B |
| mysql       | localhost | invalid                                   |
+-------------+-----------+-------------------------------------------+
3 rows in set (0,001 sec)

MariaDB [(none)]> 

```

### Setting up MySQLi

For the code to work, it is necessary to install the `mysqli` extension.

```bash
sudo apt install php-mysqli
```

```bash
❯ php -i | grep 'php.ini'
Configuration File (php.ini) Path => /etc/php/8.1/cli
Loaded Configuration File => /etc/php/8.1/cli/php.ini
```

#### Activate the `mysqli` extension

```bash
❯ grep 'extension=mysqli' /etc/php/8.1/cli/php.ini -n
930:;extension=mysqli
```

Then uncomment this line.

Restat the web server





