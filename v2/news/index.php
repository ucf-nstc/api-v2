<?php
require('../../autoloader.php');

$news = new News();
echo($news->getAll());
