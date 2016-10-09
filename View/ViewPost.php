<?php

namespace View;

class ViewPost 
{
	public function render($data)
	{
		$title = $data['postInfo']['title_post'];
		$price = $data['postInfo']['price'];
		$description = $data['postInfo']['description_post'];
		$year = $data['postInfo']['year_of_manufacture'];
		
		echo "<h1> Prodavam $title </h1>" . PHP_EOL ;
		echo "<p> $year proizvedena  </p> ". PHP_EOL ;
		echo "<p> description : $description  </p> ". PHP_EOL ;
		echo "<p> CENA: $price  </p> ". PHP_EOL ;
		
		
		$count = count($data['pictures']);
		
		
		for($i = 0; $i < $count ; $i++)
		{
			echo "<img src= ' " . '../'  . $data['pictures'][$i]['url_pic'] . " '  height ='130' .
					width='150' . />" . PHP_EOL;
		}
	}
}