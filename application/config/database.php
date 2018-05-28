<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
| DATABASE CONNECTIVITY SETTINGS
| -------------------------------------------------------------------
| This file will contain the settings needed to access your database.
|
| For complete instructions please consult the 'Database Connection'
| page of the User Guide.
|
| -------------------------------------------------------------------
| EXPLANATION OF VARIABLES
| -------------------------------------------------------------------
|
|	['hostname'] The hostname of your database server.
|	['username'] The username used to connect to the database
|	['password'] The password used to connect to the database
|	['database'] The name of the database you want to connect to
|	['dbdriver'] The database type. ie: mysql.  Currently supported:
				 mysql, mysqli, postgre, odbc, mssql, sqlite, oci8
|	['dbprefix'] You can add an optional prefix, which will be added
|				 to the table name when using the  Active Record class
|	['pconnect'] TRUE/FALSE - Whether to use a persistent connection
|	['db_debug'] TRUE/FALSE - Whether database errors should be displayed.
|	['cache_on'] TRUE/FALSE - Enables/disables query caching
|	['cachedir'] The path to the folder where cache files should be stored
|	['char_set'] The character set used in communicating with the database
|	['dbcollat'] The character collation used in communicating with the database
|				 NOTE: For MySQL and MySQLi databases, this setting is only used
| 				 as a backup if your server is running PHP < 5.2.3 or MySQL < 5.0.7
|				 (and in table creation queries made with DB Forge).
| 				 There is an incompatibility in PHP with mysql_real_escape_string() which
| 				 can make your site vulnerable to SQL injection if you are using a
| 				 multi-byte character set and are running versions lower than these.
| 				 Sites using Latin-1 or UTF-8 database character set and collation are unaffected.
|	['swap_pre'] A default table prefix that should be swapped with the dbprefix
|	['autoinit'] Whether or not to automatically initialize the database.
|	['stricton'] TRUE/FALSE - forces 'Strict Mode' connections
|							- good for ensuring strict SQL while developing
|
| The $active_group variable lets you choose which connection group to
| make active.  By default there is only one group (the 'default' group).
|
| The $active_record variables lets you determine whether or not to load
| the active record class
*/

$active_group = 'user';
$active_record = TRUE;

$db['port']['hostname'] = 'db';
$db['port']['username'] = 'profile_teacher';
$db['port']['password'] = 'R7t9Q9pN';
$db['port']['database'] = 'profile_teacher';
$db['port']['dbdriver'] = 'mysqli';
$db['port']['dbprefix'] = '';
$db['port']['pconnect'] = TRUE;
$db['port']['db_debug'] = TRUE;
$db['port']['cache_on'] = FALSE;
$db['port']['cachedir'] = '';
$db['port']['char_set'] = 'utf8';
$db['port']['dbcollat'] = 'utf8_general_ci';
$db['port']['swap_pre'] = '';
$db['port']['autoinit'] = TRUE;	
$db['port']['stricton'] = FALSE;

$db['user']['hostname'] = '103.86.50.206';
$db['user']['username'] = 'profile_teacher';
$db['user']['password'] = 'profile_teacher01';
$db['user']['database'] = 'profile_teacher';
$db['user']['dbdriver'] = 'mysqli';
$db['user']['dbprefix'] = '';
$db['user']['pconnect'] = TRUE;
$db['user']['db_debug'] = TRUE;
$db['user']['cache_on'] = FALSE;
$db['user']['cachedir'] = '';
$db['user']['char_set'] = 'utf8';
$db['user']['dbcollat'] = 'utf8_general_ci';
$db['user']['swap_pre'] = '';
$db['user']['autoinit'] = TRUE;	
$db['user']['stricton'] = FALSE;


/* End of file database.php */
/* Location: ./application/config/database.php */