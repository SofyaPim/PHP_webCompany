<?php
require ($_SERVER['DOCUMENT_ROOT']. "/myProject1/Connect.php");
require ($_SERVER['DOCUMENT_ROOT']. "/myProject1/components/header/index.php");


?>
<div class="slider">
    <div class="item">
                <img src="/myProject1/images/top3.jpg" alt="Второй слайд">
                <div class="slideText">
                    <h6 class="moto">МЫ РАБОТАЕМ, ВЫ ОТДЫХАЕТЕ</h6>
                    <p class="moto1"> GO TO TOP- ваш быстрый старт продаж</p>
                   
                </div>
            </div>
</div>
        <div class="tema flexColumn">
            <?
                $link = mysqli_connect($host, $user, $password, $database);
                $result = mysqli_query($link, 'SELECT * FROM pages Where ID=1' );
                while($row = mysqli_fetch_assoc($result)){?>
                    <h2> <?=$row['title']?></h2>
                        <div class="card__line"> </div>
                        <div class="picture flexRow flexAround">
                        <p><?=$row['text']?></p>   
                    
                        </div>  
            <?}?>
        </div>  
            
  
    
         
    
    
        <div class="gallery">
            <div class="tema flexColumn">
                <h2> СВЯЖИТЕСЬ С НАМИ</h2>
                <div class="card__line"> </div>
            </div>
            <div class=" news flexRow flexAround">
                <div class="moreInfo flexRow">
                    <img src="images/woman.jpg" alt="">
                    <div class="text">
                        <p> Елена Белкина </p>
                        
                        <h4> директор</h4>
                        <p>по вопросам сотрудничества  </p>
                        
                        <h4> belkina@gototop.ru</h4>
                    </div>
                </div>
                    <div class="moreInfo flexRow">
                        <img src="images/man.jpg" alt="">
                        <div class="text">
                            <p> Дмитрий Рогозин </p>
                            
                            <h4> директор отдела продаж</h4>
                            <p>по вопросам развития бизнеса  </p>
                            
                            <h4> rogozin@gototop.ru</h4>
                        </div>
                    </div>

             </div>
        </div>
   
       
 

<?php
require ($_SERVER['DOCUMENT_ROOT']. "/myProject1/components/footer/index.php");


?> 
<?php
require 'Connect.php'; // подключаем скрипт
 
if(isset($_GET['name']) && isset($_GET['email'])&& isset($_GET['text'])){
 
    // подключаемся к серверу
    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link)); 
     
    // экранирования символов для mysql
    $name = htmlentities(mysqli_real_escape_string($link, $_GET['name']));
	$company = htmlentities(mysqli_real_escape_string($link, $_GET['email']));
	$text = htmlentities(mysqli_real_escape_string($link, $_GET['text']));
     
    // создание строки запроса
    $query ="INSERT INTO form VALUES(NULL, '$name','$email','$text')";
     
    // выполняем запрос
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
    if($result)
    {
        echo "<span style='color:blue;'>Данные добавлены</span>";
    }
    // закрываем подключение
    mysqli_close($link);
	
header("Location: /myProject1/index.php/"); 


exit;

}?>	