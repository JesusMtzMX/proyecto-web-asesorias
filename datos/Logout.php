<?php

    session_id('Invitado');

    session_start();

    session_destroy();

    header('location: ../app/index.php');


?>