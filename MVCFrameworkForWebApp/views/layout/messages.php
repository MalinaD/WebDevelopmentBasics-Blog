<?php
renderMessage('info');
renderMessage('error');

if(!isset($_SESSION['messages'])){
    echo "";
    foreach ($_SESSION['messages'] as $msg){
        
    }
}

