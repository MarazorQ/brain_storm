<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>ATM</title>
	<link rel="stylesheet" href="css/index.css">
</head>
<body>
	<form  class="profile" method="POST">
		<h1> Банкомат</h1>
		<div class="item">
			<label for=""> Номинал в наличии </label>
			<input type="text" name="money" placeholder="">
		</div>
		<div class="item"> 
			<label for=""> Ваша сумма </label>
			<input type="text" name="sum" placeholder="введите нужную сумму">
		</div>
		<div type="submit" class="item">
			<button class="btn">Отправить</button>
		</div>
	<table class="msg none">
		<tr>
			<th>номинал</th>
			<th>количество</th>
		</tr>
		<tr>
			<td>5</td>
			<td></td>
		</tr>
		<tr>
			<td>10</td>
			<td></td>
		</tr>
		<tr>
			<td>20</td>
			<td></td>
		</tr>
		<tr>
			<td>50</td>
			<td></td>
		</tr>
		<tr>
			<td>100</td>
			<td></td>
		</tr>
		<tr>
			<td>200</td>
			<td></td>
		</tr>
		<tr>
			<td>500</td>
			<td></td>
		</tr>
	</table>
		<p class="msg none"> ddff</p>
	</form>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>