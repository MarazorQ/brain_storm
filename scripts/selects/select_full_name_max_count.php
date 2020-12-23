<?php

	require_once '../setting_connection/connection.php'; // подключаем скрипт
		 
	// подключаемся к серверу
	$link = mysqli_connect($host, $user, $password, $database) 
		or die("Ошибка " . mysqli_error($link));
		 
	$query = "SELECT fullname FROM persons WHERE persons.id = (SELECT COUNT(from_person_id) FROM transactions GROUP BY from_person_id ORDER BY COUNT(from_person_id) DESC LIMIT 1 )";

	$result = mysqli_query($link, $query) or die('SQL Query не возможна!');

	// выполняем операции с базой данных

    if (mysqli_num_rows($result) !== 0) 
    {
    	while($rows = mysqli_fetch_assoc($result)) 
        {
            echo "Имя человека, совершившего наибольшее число транзакций: " . $rows['fullname'];
        }
    } 
    else 
    {
    	echo "По вашему запросу ничего не найлено ";
    }
     
	// закрываем подключение
	mysqli_close($link);

?>