<html lang="en">
	
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="style.css">
		<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon"> 
		<title>главная</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</head>
	<script type="text/javascript">
		function rus_date() {
			var d = new Date();
			var month = 'января февраля марта апреля мая июня июля августа сентября октября ноября декабря'.split(' ')[d.getMonth()];
			document.write(d.getDate() + ' ' + month + ' ' + d.getFullYear() + ' г.');
		};
	</script>
	
	
	<body >
		
		<div id="block-body">
			
			<header>
				<div class="logo">
					<a href="index.php"><img src="images/logo.png" width= 60px height= 60px></a>       
				</div>  
				
				<div class="top-menu">
					<ul>
						<li><a href="index.php">прачечная</a></li>
						<li><a href="news.php">новости</a></li>
						<li><a href="price-list.php">прайс-лист</a></li>
						<li><a href="about_us.php">о нас</a></li>
						<li><a href="Contact-Information.php">контакты</a></li>
						<li><a href="time.php"> <script type="text/javascript">rus_date();</script> </a></li>
					</ul>  
				</div> 
				
				<div class="block-top-auth">
					<p><a href="auth.php">Вход</a></p>  
					<p><a href="#">Регистрация</a></p>  
				</div>  
				
			</header>
			
			
			<?php
				
				$link = mysqli_connect("localhost", "admin", "admin", "lotos2") 
				or die("Ошибка " . mysqli_error($link));
				mysqli_query($link,"SET NAMES utf8");
				mysqli_query($link,"SET CHARACTER SET utf8");
				mysqli_query($link,"SET character_set_client = utf8");
				mysqli_query($link,"SET character_set_connection = utf8");
				mysqli_query($link,"SET character_set_results = utf8");	
				$query ="SELECT ntitle, ntext, ndate FROM news order by ndate desc";
				
				$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
				if($result)
				{
					$rows = mysqli_num_rows($result); // количество полученных строк
					
					
					for ($i = 0 ; $i < $rows ; ++$i)
					{
						$row = mysqli_fetch_row($result);
						echo "<div id='block-content'>";
						for ($j = 0 ; $j < 3 ; ++$j) echo "<P>$row[$j]</P>";
						echo "</div>";
					}
					
					
					// очищаем результат
					mysqli_free_result($result);
				}
				
				mysqli_close($link);
			?>
			
		</div> 	
		
		
		<center>
			<div id="block-content">
			<footer>
			<div class="footer-bg">
			Copyright
			</div>
			</footer>
			</div>
			</center>
			</body>			