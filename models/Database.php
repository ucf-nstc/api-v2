<?php

// DatabaseConfig object
require('../config/db.php');

class Database {
  private static $connection;

  public static function connect() {
    if(!isset(self::$connection)) {
      self::$connection = mysql_connect(DatabaseConfig::$host, DatabaseConfig::$user, DatabaseConfig::$pass) or die(mysql_error());
      mysql_set_charset('utf8');
      mysql_select_db(DatabaseConfig::$database);
    }
  }

  // TODO remove this, write some real functions, etc
  public static function testQuery() {
    self::connect();

    /* construct the SQL statement */
    $sql = "SELECT `news`.`id`, DATE_FORMAT(`datestamp`,\"%M %Y\") as dateinfo, `moreinfo`,`title`, `photo_path`,`photo_path2`,`description`,`department`, `postdate`, `groups` FROM `news`";

    $sql .= " ORDER BY datestamp desc";

    /* execute SQL statement and store the result */
    $result = mysql_query($sql);
    if (!$result) {
        $message  = 'Invalid query: ' . mysql_error() . "\n";
        $message .= 'Whole query: ' . $query;
        die($message);
    }


    $output = array();
    while ($row = mysql_fetch_assoc($result)) {
    	$post = array(
    		'id' => $row['id'],
    		'groups' => $row['groups'],
    		'postdate' => $row['postdate'],
    		'title' => strip_tags($row['title']),
    		'department' => $row['department'],
    		'content' => strip_tags($row['description'])
    	);
    	array_push($output, $post);
    }

    $json = json_encode($output);
    echo($json);
  }
}

Database::testQuery();
