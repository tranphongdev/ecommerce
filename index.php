<?php
    ob_start();
    session_start();
    include_once 'db/config.php';
    include_once 'view/header.php';
    if(isset($_GET['page'])){
        switch ($_GET['page']) {
            case 'shop':
                include_once 'view/shop.php';
                break;
            case 'detail':
                include_once 'view/detail.php';
                break;
            case 'checkout':
                include_once 'view/checkout.php';
                break;
            case 'login':
                include_once 'view/login.php';
                break;
            case 'logout':
                include_once 'view/logout.php';
                break;
            case 'register':
                include_once 'view/register.php';
                break;
            default:
                include_once 'view/home.php';
                break;
        }
    }
    else{
        include_once 'view/home.php';
    }
    include_once 'view/footer.php';
?>