<?php

	require_once '../lib/simple_html_dom.php';

 	function site_parse($html,$team_search)
    {	
    	$team_counter = 0;
        foreach($html->find('div[class=tab]') as $seasons)
        {
	        foreach($seasons->find('a[href^=/football/italy/championship]') as $team_archive_link)
	        {
	            $season_period = substr($team_archive_link->innertext, 0, 7);
	            $season_statistic_page = file_get_html("https://terrikon.com".$team_archive_link->href);
	            $championship_table = $season_statistic_page->find('table[class=colored big]')[0];
	                    
	            foreach(array_slice($championship_table->find('tr'), 1) as $team_stat)
	            {
	                $place = $team_stat->find('td')[0]->innertext;
	                $team = $team_stat->find('td')[1]->plaintext;
	                if($team == $team_search)
	                {
	                    echo 'Сезон: '.$season_period.'. Место: '.$place.'<br>';
	                    $team_counter++;
	                }
	            }
	        }
        }
        return $team_counter;
    }


    if(isset($_POST['find']))
    {
        $team_search = $_POST['team'];

        $html = new simple_html_dom();
   		$html = file_get_html("https://terrikon.com/football/italy/championship/archive");
        
        $the_result_of_searching = site_parse($html, $team_search);
        
        if($the_result_of_searching == 0)
        {
         	echo "Таких команд нет </br>";
        }
        echo '<a href = "../index.html">назад</a>';
    }

?>