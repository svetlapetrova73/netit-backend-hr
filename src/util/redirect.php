<?php

function redirecT($pageName) {
    return header('Location: ' . $pageName . '.php');
}

