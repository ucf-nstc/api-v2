<?php

// autoloader
spl_autoload_register(function($class) {
  // Ends with a string "Controller"?
  if (preg_match('/Controller$/', $class))
    require("controllers/" . $class . ".php");
  else
    require("models/" . $class . ".php");
});
