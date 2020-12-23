<?php

    require_once '../setting_connection/connection.php'; // подключаем скрипт
		 
	// подключаемся к серверу
	$link = mysqli_connect($host, $user, $password, $database) 
		or die("Ошибка " . mysqli_error($link));
		 
	$query = "SELECT fullname, amount FROM persons WHERE fullname='Ivan Petrov'";

    $result = mysqli_query($link, $query) or die('SQL Query не возможна!');

    if (mysqli_num_rows($result) !== 0) 
    {
        while($rows = mysqli_fetch_assoc($result)) 
        {
            echo "Имя Фамилия : " . $rows["fullname"]. "</br>Баланс: " . $rows["amount"]."</br>";
        }
    } 
    else
    {
        echo "По вашему запросу ничего не найлено ";
    }
     
	// закрываем подключение
	mysqli_close($link);

?>