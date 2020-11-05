<?php

//declaring variable
$errorname = $errormail = $errorpass = "";
$name = $mail = $pass = $newrecord = "";
$count = 0;

//if the form is submitted 
if (isset($_POST['submit'])) {

    //assigning variable 
    $name = $_POST["name"];
    $mail = $_POST["mail"];
    $pass = $_POST["pass"];

    //name validaton
    if (empty($name)) {
        $errorname = "write a valid name you piece of shit";
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $errorname = "are you kid of elon musk";
        } else {
            $count = $count + 1;
        }
    }

    //mail validation
    if (empty($mail)) {
        $errormail = "write a valid name you piece of shit";
    } else {
        if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            $errormail = "write something that make what?";
        } else {
            $count = $count + 1;
        }
    }

    //password validaton
    if (empty($pass)) {
        $errorpass = "write a password";
    } elseif (strlen($pass) <= '8') {
        $errorpass = "read before you type nerd";
    } else {
        $count = $count + 1;
    }

    //if all validation are successful then the count will be 3 
    //then enter into creating database

    if ($count == 3) {
        $servername = "localhost";
        $username = "root";
        $password = "";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password);

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Create database
        $sql = "CREATE DATABASE myDB";
        if (mysqli_query($conn, $sql)) {
            //echo "Database created successfully";
            $conn = mysqli_connect($servername, $username, $password, 'myDB');

            if ($conn) {
                //create table                 
                $sql = "CREATE TABLE form(name varchar(20) NOT NULL,mail varchar(20) NOT NULL,password varchar(20) NOT NULL);";
                //if the table is not created                 
                if (mysqli_query($conn, $sql)) {
                    //insert statement                                       
                    $sql = "INSERT INTO form (name,mail,password) VALUES ('$name','$mail','$pass')";
                    if (mysqli_query($conn, $sql)) {
                        $newrecord = "Data Recorded";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
                //if the table is already created                
                else {
                    //insert statement                    
                    $sql = "INSERT INTO form (name,mail,password) VALUES ('$name','$mail','$pass')";
                    if (mysqli_query($conn, $sql)) {
                        $newrecord = "Data Recorded";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
            }
            //if its not connected to database            
            else {
                echo "error : DB isnot connected";
            }
        } else {

            //if the database is already created
            $conn = mysqli_connect($servername, $username, $password, 'myDB');

            if ($conn) {
                //create table                 
                $sql = "CREATE TABLE form(name varchar(20) NOT NULL,mail varchar(20) NOT NULL,password varchar(20) NOT NULL);";
                //if the table is not created                 
                if (mysqli_query($conn, $sql)) {
                    //insert statement                                       
                    $sql = "INSERT INTO form (name,mail,password) VALUES ('$name','$mail','$pass')";
                    if (mysqli_query($conn, $sql)) {
                        $newrecord = "Data Recorded";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
                //if the table is already created                
                else {
                    //insert statement                    
                    $sql = "INSERT INTO form (name,mail,password) VALUES ('$name','$mail','$pass')";
                    if (mysqli_query($conn, $sql)) {
                        $newrecord = "Data Recorded";
                    } else {
                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                    }
                }
            }
            //if its not connected to database            
            else {
                echo "error : DB isnot connected";
            }
        }
    }
}

?>
<html>

<head>
    <title>LOGIN form</title>
    <link rel="stylesheet" href="modify-form.css">
</head>

<body>
    <div class="container">

        <div class="header">
            <h2>log in here</h2>
        </div>

        <form method="POST" action="./form.php" class="form">
            <div class="form-control">
                <span class="record"><?php echo $newrecord; ?></span><br>
                <label for="email"><strong>NAME</strong></label>
                <input type="text" name="name">
                <span class="error"> *<?php echo $errorname; ?></span>
            </div>

            <div class="form-control">
                <label for="email"><strong>Email</strong></label>
                <input type="email" name="mail" placeholder="example@gmail.com">
                <span class="error">*<?php echo $errormail; ?></span>
            </div>

            <div class="form-control">
                <label for="email"><strong>PASSWORD</strong></label>
                <input type="text" placeholder="should contain 8 char" name="pass">
                <span class="error"> *<?php echo $errorpass; ?></span>
            </div>

            <button type="submit" name="submit">sumbit</button>
            <div class="form-footer">
                <small>Dont't have an account? <a href="#">Sign up</a></small>

            </div>


        </form>
    </div>
</body>

</html>