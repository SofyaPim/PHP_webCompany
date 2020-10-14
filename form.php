<?php
require 'Connect.php'; // подключаем скрипт
 
if(isset($_GET['name']) && isset($_GET['email'])&& isset($_GET['text'])){
 
    
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    
    $name = htmlentities(mysqli_real_escape_string($link, $_GET['name']));
	$email = htmlentities(mysqli_real_escape_string($link, $_GET['email']));
	$text = htmlentities(mysqli_real_escape_string($link, $_GET['text']));
     
    
          $query ="INSERT INTO form VALUES(NULL, '$name','$email','$text')";
    
  
     
    
     $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
     if($result)
     {
        echo "<span style='color:blue;'>Данные добавлены</span>";
    }
     
      mysqli_close($link);
    
     header("Location: /myProject1/index.php"); 
    
     
}?>