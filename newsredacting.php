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
		<script type="text/javascript">
			function rus_date() {
				var d = new Date();
				var month = 'января февраля марта апреля мая июня июля августа сентября октября ноября декабря'.split(' ')[d.getMonth()];
				document.write(d.getDate() + ' ' + month + ' ' + d.getFullYear() + ' г.');
			};
		</script>
		<style>	
		
		td{
			text-align:center;
			margin:0;
			padding:5px;
		}
		textarea{
			resize: none;
			width: 400px;
			color: black;	
			height: 100px;
		}
	</style>
	</head>
	<body>
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


		<div id="block-content" align=center>
		<?php
			$link = mysqli_connect("localhost", "admin", "admin", "lotos2") 
			or die("Ошибка " . mysqli_error($link));
			mysqli_query($link,"SET NAMES utf8");
			mysqli_query($link,"SET CHARACTER SET utf8");
			mysqli_query($link,"SET character_set_client = utf8");
			mysqli_query($link,"SET character_set_connection = utf8");
			mysqli_query($link,"SET character_set_results = utf8");	
			$query ="SELECT news_id, ntitle, ntext, ndate FROM news order by ndate desc";
			
			$result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
			if($result)
			{?><table>
			<tr><td>Заговолок</td><td>Новость</td><td>Действие</td></tr>
			<form action="" method=post><tr>
			<td><textarea name="ntitle"></textarea></td>
				<td><textarea name="ntext"></textarea></td>
				<td><input type="submit" name="add" value="Добавить"></td>
			</tr></form>
			<?php
				if(isset($_POST['add'])){
					mysqli_query($link, "insert into news (`ntitle`, `ntext`) values('".$_POST['ntitle']."','".$_POST['ntext']."')");
				}

			while ($row = mysqli_fetch_object($result)):?>
			<form action="" method=post><tr>
				<input type=hidden value="<?php echo $row->news_id?>" name = "news_id">
				<td><textarea name="ntitle"><?php echo $row->ntitle?></textarea></td>
				<td><textarea name="ntext"><?php echo $row->ntext?></textarea></td>
				<td><table>
					<tr><td><input type="submit" name="update" value="Изменить"></td></tr>
					<tr><td><input type="submit" name="submit" value="Удалить"></td></tr>
				</table></td>
			</tr></form>
			<?php
				if(isset($_POST['submit']))
				{
					mysqli_query($link, "delete from news where `news_id` = '".$_POST['news_id']."'");
				}
				else if (isset($_POST['update']))
				{
					mysqli_query($link, "update `news` set `ntitle` = '".$_POST['ntitle']."', `ntext` = '".$_POST['ntext']."' where `news_id` = '".$_POST['news_id']."'");
				}
				endwhile;
				mysqli_close($link);
			}?>
			
			</table>
			
		</div> 
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