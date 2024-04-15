<?php
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    ob_start();
    session_start();
    if(!$_SESSION['login']){
        header("location: login.php");
    }
    include_once '../db/config.php';
    include_once 'view/header.php';
    if(isset($_GET['page'])){
        switch ($_GET['page']) {
            case 'users':
                include_once 'view/users/users.php';
                break;
            case 'addusers':
                include_once 'view/users/addusers.php';
                break;
            case 'editusers':
                include_once 'view/users/editusers.php';
                break;
            case 'category':
                include_once 'view/category/category.php';
                break;
            case 'addcategory':
                include_once 'view/category/addcategory.php';
                break;
            case 'editcategory':
                include_once 'view/category/editcategory.php';
                break;
            case 'products':
                include_once 'view/product/product.php';
                break;
            case 'addproducts':
                include_once 'view/product/addproduct.php';
                break;
            case 'editproducts':
                include_once 'view/product/editproduct.php';
                break;
            case 'orders':
                include_once 'view/orders/orders.php';
                break;
            case 'detailorder':
                include_once 'view/orders/detailorder.php';
                break;
            case 'cart':
                include_once 'view/orders/cart.php';
                break;
            case 'logout':
                include_once 'view/logout.php';
                break;
            case 'profile':
                include_once 'view/profile/profile.php';
                break;
            case 'contact':
                include_once 'view/contact/contact.php';
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































































  

 