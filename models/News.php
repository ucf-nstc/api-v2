<?php

class News {
  public function getAll() {
    Database::connect();

    $sql = "SELECT `news`.`id`, DATE_FORMAT(`datestamp`,\"%M %Y\")
      as dateinfo, `moreinfo`,`title`, `photo_path`,`photo_path2`,`description`,`department`, `postdate`, `groups`
      FROM `news`
      ORDER BY datestamp desc";

    $output = array();
    $result = Database::query($sql);
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

    return json_encode($output);
  }

  public function getOneById() {
    // TODO someday...
  }
}
