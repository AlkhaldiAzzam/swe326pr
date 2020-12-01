<?php


        $FName = "NoValue";
        if(isset($_POST["Allusers"]))
        {
            $AllUsers = true;
        }
        else
        {
            $FName = $_POST["FName"];
        }
        $Title = $_POST["Title"];
        $Content = $_POST["Content"];

        require("../../dbConnect.php");

        if(isset($_POST["Allusers"]))
        {
            $sql = "SELECT Email FROM SUser";
        }
        else
        {
            $sql = "SELECT Email FROM SUser WHERE FName = '$FName'";
        }
        

        $Email = mysqli_query($link, $sql);
        
        echo "<script type='text/javascript' src='https://cdn.emailjs.com/dist/email.min.js'></script>
                <script type='text/javascript'>
                    (function() {
                            emailjs.init('user_tZb4GteScTkf3nR0zJrj7');
                        })(); 
                        
                var notificationTitle = '$Title';
                var notificationBody = '$Content';
                </script>";

        if(isset($_POST["Allusers"]))
        {
            $numOfRows = mysqli_num_rows($Email);
            
            for($i=0; $i<$numOfRows; $i++)
            {
                $row = mysqli_fetch_array($Email);
                $e = $row[0];
                
                $sql = "SELECT FName FROM SUser WHERE Email = '$e'";
                $FName = mysqli_query($link, $sql);
                $row2 = mysqli_fetch_assoc($FName);
                $FName = $row2['FName'];
//                $e = json_encode($e);
                echo "
                <script>
                        
                var notificationFName = '$FName';
                var Email = '$e';
                
                emailjs.send('quiz_result', 'fr_portfolio', {
                           'Email': Email,
                            'notificationFName': notificationFName,
                            'notificationTitle': notificationTitle,
                            'notificationBody': notificationBody
                        });
                </script>";
            }
        }
        else
        {
            $row = mysqli_fetch_assoc($Email);
            $e = $row['Email'];

            echo "
                <script>     
                var notificationFName = '$FName';
                var Email = '$e';
                
                emailjs.send('quiz_result', 'fr_portfolio', {
                           'Email': Email,
                            'notificationFName': notificationFName,
                            'notificationTitle': notificationTitle,
                            'notificationBody': notificationBody
                        });
                </script>";
        }

        $link->close();

    
        echo "Notification has been sent successfuly!";
        header( "refresh:2;url=../notification" );
?>
