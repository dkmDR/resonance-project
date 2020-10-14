<?php
    $session = Factory::getSession();
    if($session->logger){
        session_destroy();
        header("Location: " . Factory::redirectTo() . "home");
    }