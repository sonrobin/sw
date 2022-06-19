<?php
    include 'inc_head.php';
    include 'dbconnect.php';

    if ( !$jb_login ) 
    {
        echo("<script>location.href='./login.html';</script>"); 
    }

    $title = $_POST[ 'title' ];
    $contents = strip_tags($_POST[ 'contents' ]);
    
    //echo '<script>alert("'.$title.'");</script>';

    //echo '<script>alert("'.$contents.'");</script>';
    $conn = mysqli_connect($host, $user, $pw, $dbName);
    $today = date("Y-m-d");
    
    //$row = $result->fetch_array(MYSQLI_ASSOC);
    if (mysqli_query($conn, "INSERT INTO noticeINFO (comp, title, txtinfo, user, curdate) VALUES('$_SESSION[companyname]', '$title', '$contents','$_SESSION[fullname]','$today')")) 
    {
        echo("<script>location.href='./tables.html';</script>");
        exit;
    } else {
        echo mysqli_error($conn);
        echo '<script>alert("error 발생");</script>';
        echo("<script>location.href='./register.html';</script>");
        exit;
    }

        
    mysqli_close($conn);
    /*
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
    */
?>