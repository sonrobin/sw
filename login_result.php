<?php
      include 'inc_head.php';
      include 'dbconnect.php';
      
      if ( $jb_login ) {
        echo("<script>location.href='./index.html';</script>"); 
      } else {
        $username = $_POST[ 'username' ];
        $password = $_POST[ 'password' ];

        $conn = mysqli_connect($host, $user, $pw, $dbName);
        $q = "SELECT * FROM registerINFO WHERE uemail= '$username' AND password = '$password'";
        $result = mysqli_query($conn, $q);


        if (mysqli_num_rows($result) > 0) {
          $_SESSION[ 'uemail' ] = $username;
          $row = mysqli_fetch_assoc($result);
          $_SESSION['companyname'] = $row["companyname"];
          $_SESSION['fullname'] = $row["fullname"];
          $_SESSION['confirm'] = $row["confirm"];
          $_SESSION['master'] = $row["master"];

          //echo '<script>alert("'.$_SESSION['confirm'].'");</script>';
          if(!isset($_SESSION['companyname']) and $_SESSION['confirm'] == 0)
          {
            echo("<script>location.href='./select.html';</script>");
            echo '<script>alert("'.$row['companyname'].'");</script>';
          }
          else
          {
            if($_SESSION['master'] == 1)
            {
              echo("<script>location.href='./index.html';</script>");
            }
            else
            {
              echo("<script>location.href='./index_user.html';</script>");
            }
            
          }
          if(isset($_SESSION['companyname']) and ( $_SESSION['confirm'] == 0))
          {
            //echo '<script>alert("'.$row['companyname'].'");</script>';
            echo("<script>location.href='./reco.html';</script>");
          }
          
          
          
          
          exit;
        } else {
          echo '<script>alert("사용자 이름 또는 비밀번호가 틀렸습니다.");</script>';
          echo("<script>location.href='./login.html';</script>");
          exit;
        }
        mysqli_close($conn);
      }
    ?>