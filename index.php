<?php
require ($_SERVER['DOCUMENT_ROOT']. "/myProject1/Connect.php");
require ($_SERVER['DOCUMENT_ROOT']. "/myProject1/components/header/index.php");


?>
 <div class="slider">
            <div class="item">
                <img src="/myProject1/images/back1.jpg" alt="Первый слайд">
                <div class="slideText">
                    <p class="moto">ВАШ САЙТ - ВАШ ГЛАВНЫЙ БИЗНЕС ИНСТРУМЕНТ</p>
                    <p class="moto1"> GO TO TOP- ваш быстрый старт продаж</p>
                   <a href="/myProject1/about.php"> <button>  О НАС</button> </a>
                </div>
            </div>
            <div class="item">
                <img src="/myProject1/images/top1.jpg" alt="Второй слайд">
                <div class="slideText">
                    <p class="moto">GO TO TOP</p>
                    <p class="moto1"> GO TO TOP- ваш быстрый старт продаж</p>
                    <button> -КОНТАКТЫ- </button>
                </div>
            </div>
            <div class="item">
                <img src="/myProject1/images/top2.jpg" alt="Третий слайд">
                <div class="slideText">
                    <p class="moto">НОВЫЕ РАЗРАБОТКИ И НОВЫЕ ТРЕНИНГИ</p>
                    <p class="moto1"> GO TO TOP</p>
                    <button> -НОВОСТИ- </button>
                </div>
            </div>
            <div class="item">
                <img src="/myProject1/images/top3.jpg" alt="Третий слайд">
                <div class="slideText">
                    <p class="moto">МЫ РАБОТАЕМ, ВЫ ОТДЫХАЕТЕ</p>
                    <p class="moto1"> GO TO TOP</p>
                    <button> -НОВОСТИ-</button>
                </div>
            </div>
            <a class="prev" onclick="minusSlide()">&#10094;</a>
            <a class="next" onclick="plusSlide()">&#10095;</a>
        </div>
        <div class="slider-dots">
            <span class="slider-dots_item" onclick="currentSlide(1)"></span>
            <span class="slider-dots_item" onclick="currentSlide(2)"></span>
            <span class="slider-dots_item" onclick="currentSlide(3)"></span>
        </div>
<div class="cards">
 
<?
	$link = mysqli_connect($host, $user, $password, $database);
	$result = mysqli_query($link, 'SELECT * FROM services' );
	while($row = mysqli_fetch_assoc($result)){?>
		<div class="card flexColumn alignItems">
			<div class="card__icon"><?="<img src=".$row['icon'].">"?></div> 
			<h3 class="card__h3"><?=$row['header']?></h3> 
			
			<p class="card__p"><?=$row['text']?></p>   
		</div>
		 
<?}?>

</div>    

 
<div class="contact flexRow alignItem">
	
		<p>ХОТИТЕ НАЧАТЬ ЗАРАБАТЫВАТЬ В ИНТЕРНЕТЕ ПРОСТО СВЯЖИТЕСЬ С НАМИ</p>
		<button id="myBtn">связаться</button>
		
		<div id="myModal" class="modal"> 
 		 	<div class="modal-content">
					   <span class="close">&times;</span>
 

      				<form  class="modalForm " action="/myProject1/form.php" method="GET">     
 
        				<input type="text" name="name" placeholder="Введите Ваше имя" required>                  
        				<input type="email" name="email" placeholder="Ваш email" required>       
       				 	<textarea name="text"  cols="30" rows="5"> </textarea>
        				<input type="submit" value="Отправить" style="background-color:pink;">
    
					</form>
					
    		</div>
  		</div>


 

</div>

	
	<div class="gallery">
		<div class="tema flexColumn">
			<h2> ПОСЛЕДНИЕ РАБОТЫ</h2>
			<div class="card__line"> </div>
		</div>
		<div class="picture">
<?
	$link = mysqli_connect($host, $user, $password, $database);
	$result = mysqli_query($link, 'SELECT * FROM works' );
	while($row = mysqli_fetch_assoc($result)){?>

				<?="<img src=".$row['sites'].">"?>
<?}?>            
		</div>
	</div>
	<div class="statistic flexRow flexAround">
		<div class="datas flexColumn alignItems">
			<h2> 456</h2>
			<div class="line"> </div>
			<p> СЧАСТЛИВЫХ КЛИЕНТОВ </p>
		</div>
		<div class="datas flexColumn alignItems">
			<h2> 322</h2>
			<div class="line"> </div>
			<p> ПРОЕКТА</p>
		</div>
		<div class="datas flexColumn alignItems">
			<h2> 290</h2>
			<div class="line"> </div>
			<p> САЙТОВ В ТОП </p>
		</div>
		<div class="datas flexColumn alignItems">
			<h2> 132</h2>
			<div class="line"> </div>
			<p> САЙТА РАЗРАБОТАНО </p>
		</div>

	</div>
	<div class="gallery">
		<div class="tema flexColumn">
			<h2> НОВОСТИ</h2>
			<div class="card__line"> </div>
		</div>
		<div class=" news flexRow flexAround">
 <?
	$link = mysqli_connect($host, $user, $password, $database);
	$result = mysqli_query($link, 'SELECT * FROM news' );
	while($row = mysqli_fetch_assoc($result)){?>
		
			<div class="moreInfo ">    
					 
		<?="<img src=".$row['photo'].">"?>
		<div class="column_news">
					 <p><?=$row['title']?></p> 		
					 <p><?=$row['text']?></p>   
					 <h4> ПОДРОБНЕЕ</h4></div>
			 </div>
		
		 
<?}?>
				</div>
			</div>

		
	<div class="formWrapper">
	<div class="tema flexColumn">
			<h2> НАПИШИТЕ НАМ</h2>
			<div class="card__line"> </div>
		</div>
		<form  action="/myProject1/form.php" method="GET">
			<div>
					
				<input type="text" name="name" placeholder="ФИО" >         
	
				<input type="text" name="phone" placeholder="Телефон" >        
		   
				<input type="text" name="email" placeholder="Ваш email">
				 <input type="submit" value="Напишите нам">
			</div>
		   
				<textarea name="text"placeholder="Ваши вопросы"></textarea>
			
			   
			
		</form>
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
}?>	