<?php

$auth->logOut();
$auth->destroySession();

header("Location: login");
exit();

?>