<?php 
 if (session_status() == PHP_SESSION_NONE  || session_id() == '') {
        session_start();
    }
?>