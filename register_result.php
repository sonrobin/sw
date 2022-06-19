<?php
    include 'inc_head.php';
    include 'dbconnect.php';
    if ( $jb_login ) 
    {
        echo("<script>location.href='./index.html';</script>"); 
    }

    $fname = $_POST[ 'fname' ];
    $lname = $_POST[ 'lname' ];
    $uemail = $_POST[ 'uemail' ];
    $password1 = $_POST[ 'password1' ];
    $password2 = $_POST[ 'password2' ];

    $re = true;

    function validateEmail($email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return;
        }
        else {
            echo '<script>alert("올바른 email을 입력하여주세요.");</script>';
            echo("<script>location.href='./register.html';</script>");
            $re = false;
        }
    }

    if(($fname == "") and ($lname == ""))
    {
        echo '<script>alert("이름을 입력하여주세요.");</script>';
        echo("<script>location.href='./register.html';</script>");
        $re = false;
    }

    if(($uemail == ""))
    {
        echo '<script>alert("email을 입력하여주세요.");</script>';
        echo("<script>location.href='./register.html';</script>");
        $re = false;
    }

    if($password1 != $password2 )
    {
        echo '<script>alert("비밀번호가 틀렸습니다.");</script>';
        echo("<script>location.href='./register.html';</script>");
        $re = false;
    }

    if(($password1 == "") and ($password2 == ""))
    {
        echo '<script>alert("비밀번호를 입력하여주세요.");</script>';
        echo("<script>location.href='./register.html';</script>");
        $re = false;
    }

    if((mb_strlen($password1, "UTF-8") < 10) and (mb_strlen($password2, "UTF-8") < 10))
    {
        echo '<script>alert("비밀번호를 10자 이상 입력하여주세요.");</script>';
        echo("<script>location.href='./register.html';</script>");
        $re = false;
    }
    validateEmail($uemail);

    if($re == true)
    {
        $conn = mysqli_connect($host, $user, $pw, $dbName);
       
    
        //$row = $result->fetch_array(MYSQLI_ASSOC);
        if (mysqli_query($conn, "INSERT INTO userINFO (username, password) VALUES('$uemail', '$password1')")) 
        {
            if (mysqli_query($conn, "INSERT INTO registerINFO (fullname, fname, lname, uemail, password) VALUES('$fname$lname', '$fname', '$lname', '$uemail', '$password1')")){
                echo '<script>alert("회원가입이 완료되었습니다.");</script>';
                echo("<script>location.href='./login.html';</script>");
                exit;
            } else {
                echo mysqli_error($conn);
                echo '<script>alert("error 발생");</script>';
                echo("<script>location.href='./register.html';</script>");
                exit;
            }
            exit;
        } else {
            echo mysqli_error($conn);
            echo '<script>alert("error 발생");</script>';
            echo("<script>location.href='./register.html';</script>");
            exit;
        }

        
        mysqli_close($conn);
    }
    
?>