<?php
// Bad, but being called from v2/route should fix
require('../../config/DatabaseConfig.php');

class Database {
  private static $connection;

  public static function connect($host = '', $user = '', $pass = '', $database = '') {
    if(DatabaseConfig::$auth) {
      $host = DatabaseConfig::$auth['host'];
      $user = DatabaseConfig::$auth['user'];
      $pass = DatabaseConfig::$auth['pass'];
      $database = DatabaseConfig::$auth['database'];
    }

    if(!isset(self::$connection)) {
      self::$connection = mysql_connect( $host, $user, $pass) or die(mysql_error());

      mysql_set_charset('utf8');
      mysql_select_db($database);
    }
  }

  public static function query($query) {
    return mysql_query($query);
  }
}
