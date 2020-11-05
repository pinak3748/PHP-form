# PHP Login form

A Simple Login Form developed in PHP and MYSQL with HTML5 Form validation.

# whats different

> **It checks if the** *username* , *email* **and** *password* **is valid or not**    
```php
if (empty($name)) {
        $errorname = "write a valid name you piece of shit";
    } else {
        if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
            $errorname = "are you kid of elon musk";
        } else {
            $count = $count + 1;
        }
    }
```
> **If all the validation are successful then it connect to your server**

> **It use** *local* [xampp](https://www.apachefriends.org/) *server* **and fetch the data directly to** *database*.     

```php
   $conn = mysqli_connect($servername, $username, $password);  
   if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
```

- If the database or table is already created then it will show error. 
```php
   echo "error : Database is not connected";  
   echo "Error: " . $sql . "" . mysqli_error($connection);
```
- If it show error try changing database name.  
```php
 $sql = "CREATE DATABASE myDB";
 ```

