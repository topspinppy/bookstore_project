<?php
    if($_POST['username'] == "topspin" && $_POST['password'] == "432018")
    {
        header( "location: index.php" ); exit(0);
    }
    else {
        header( "location: ../../index.php" ); exit(0);
        exit(0);
    }
?>
