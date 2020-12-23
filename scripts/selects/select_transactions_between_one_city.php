<?php

	require_once '../setting_connection/connection.php'; // подключаем скрипт
		 
	// подключаемся к серверу
	$link = mysqli_connect($host, $user, $password, $database) 
		or die("Ошибка " . mysqli_error($link));
		 
	$query = "SELECT * FROM transactions WHERE (SELECT persons.city_id FROM persons WHERE transactions.from_person_id = persons.id) = (SELECT persons.city_id FROM persons WHERE transactions.to_person_id = persons.id)";

	$result = mysqli_query($link, $query) or die('SQL Query не возможна!');

	// выполняем операции с базой данных

    if (mysqli_num_rows($result) !== 0) 
    {
        while($rows = mysqli_fetch_assoc($result)) 
        {
            echo "ID транзакции, где передача денег осуществлялась между представителями одного города: " . $rows['transaction_id'];
        }
    } 
    else 
    {
        echo "По вашему запросу ничего не найлено ";
    }
     
	// закрываем подключение
	mysqli_close($link);

?>