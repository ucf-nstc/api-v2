<?php

class DatabaseConfig {
  // The docker name for the mysql contianer is db so the host is db
  public static $auth = array(
    'host' => 'db',
    'user' => 'root',
    'pass' => 'pass',
    'database' => 'nanoscience',
  );
}
