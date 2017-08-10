<?php

class Group {
  public function getAll() {
    Database::connect();
    
    /* construct the SQL statement */
    $sql = "SELECT `group_members`.`id`, `firstName`, `lastName`, `affiliations`, `education`, `email`, `research`, `image`, `title`, `groups`, `alumni` FROM `group_members`";

    $output = array();
    $result = Database::query($sql);
    while ($row = mysql_fetch_assoc($result)) {
    	$post = array(
    		'id' => $row['id'],
    		'firstName' => $row['firstName'],
    		'lastName' => $row['lastName'],
    		'affiliations' => $row['affiliations'],
    		'education' => $row['education'],
    		'email' => $row['email'],
    		'research' => $row['research'],
    		'image' => $row['image'],
    		'title' => $row['title'],
    		'groups' => $row['groups'],
    		'alumni' => $row['alumni']
    	);
    	array_push($output, $post);
    }

    return json_encode($output);

  }
}
