<?php
 $db = mysqli_connect('localhost', 'root', '', 'prince') or
        die ('Unable to connect. Check your connection parameters.');
        mysqli_select_db($db, 'prince' ) or die(mysqli_error($db));
?>