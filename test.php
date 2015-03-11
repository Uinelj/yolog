<?php
require_once 'lib.inc.php';
$db = "./db/";
$dayFile = $db . date("Ymd");

initDb($db);
initDayFile($db, $dayFile);
//$post['name'] = "Uinelj";
$post['content'] = "Bonjour, ceci est le contenu de mon article";
$post['head'] = "Le titre biensurlol";
serializePost($post, $dayFile, $db);
displayPosts(date("Ymd"), $db);
?>