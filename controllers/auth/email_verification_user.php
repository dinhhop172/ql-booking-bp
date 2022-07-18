<?php
    include_once '../../connect.php';
    include_once '../../models/auth/function.php';
    session_start();

    if(!empty($_GET['email']) && !empty($_GET['token'])){
        $data['email'] = isset($_GET['email']) ? check_data($_GET['email']) : '';
        $data['verification_code'] = isset($_GET['token']) ? check_data($_GET['token']) : '';

        if(check_verify_email($data, $conn)){
            if(verify_email_user($data, $conn)){
                $_SESSION['success'] = '<script>alert("Email đã được xác thực")</script>';
                    return header('Location: ../../views/auth/login.php');
            }else{
                die('Xac thuc ko thanh cong');
            }
        }
    }
?>