<?php
    include 'inc_head.php';
    include 'dbconnect.php';

    $slc_com = $_POST[ 'slc_com' ];

    $conn = mysqli_connect($host, $user, $pw, $dbName);
    $q = "SELECT * FROM companyINFO WHERE empname= '$_SESSION[fullname]' AND com = '$slc_com'";
    $result = mysqli_query($conn, $q);
    $_SESSION['companyname'] = $slc_com;
    $em = $_SESSION['uemail'];
    if (mysqli_num_rows($result) < 1) {
        //echo '<script>alert("'.$em.'");</script>';
        $upresult = mysqli_query($conn, "UPDATE registerINFO SET companyname = '$slc_com' WHERE uemail = '$em'");
        //echo '<script>alert("'.$upresult.'");</script>';
        $comresult = mysqli_query($conn, "INSERT INTO companyINFO (com, empname, level, confirm) VALUES('$slc_com', '$_SESSION[fullname]', 0, 0)");
        //echo '<script>alert("'.$comresult.'");</script>';

        echo '<script>alert("회사를 선택하였습니다");</script>';
        echo("<script>location.href='./reco.html';</script>");
        
        exit;
    }
    else
    {
        echo '<script>alert("'.$_SESSION['fullname'].$slc_com.'");</script>';
    }
    
    
    mysqli_close($conn);

?>