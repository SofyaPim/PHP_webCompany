<?php
require ($_SERVER['DOCUMENT_ROOT']. "/myProject1/Connect.php");
require ($_SERVER['DOCUMENT_ROOT']. "/myProject1/components/header/index.php");


?>
<div class="slider">
    <div class="item">
                <img src="/myProject1/images/top1.jpg" alt="Второй слайд">
                <div class="slideText">
                    <p class="moto">GO TO TOP</p>
                    <p class="moto1"> GO TO TOP- ваш быстрый старт продаж</p>
                  
                </div>
            </div>
</div>


        <div class="tema flexColumn">
            <?
                $link = mysqli_connect($host, $user, $password, $database);
                $result = mysqli_query($link, 'SELECT * FROM pages Where ID=3' );
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
   
        <div class="formBlueWraper">
           <div class="iconsAdres">
               
                    <div class="whiteContacts">
                           <div class="whiteContacts_span"> <img src="icons/placeholder.png" class="whiteIcons" alt="">Москва<br>Большая Спасская,12</div>
                            <div class="whiteContacts_span"><img src="icons/telephone.png"  class="whiteIcons" alt="">Телефон<br>8(495)626-46-00</div>
                            <div class="whiteContacts_span"><img src="icons/mail.png" class="whiteIcons" alt="">E-mail<br>info@gototop</div>
                    </div>
             </div>
         <form  class="blueForm" action="/myProject1/form.php" method="GET">
            <h2>НАПИШИТЕ НАМ</h2>
            
            <input type="text" name="name" placeholder="Введите Ваше имя">                  
            <input type="email" name="email" placeholder="Ваш email">       
            <textarea name="text"  cols="30" rows="5"> </textarea>
            <input type="submit" value="Отправить" style="background-color:pink;">
    
        </form>
    
   

  
     </div> 
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2243.984100730639!2d37.645860316217835!3d55.77614798055969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54a7a220c9e5f%3A0x262ed08bf1f58a9c!2z0JHQvtC70YzRiNCw0Y8g0KHQv9Cw0YHRgdC60LDRjyDRg9C7LiwgMTIsINCc0L7RgdC60LLQsCwgMTI5MDkw!5e0!3m2!1sru!2sru!4v1562344571916!5m2!1sru!2sru" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
    
    

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