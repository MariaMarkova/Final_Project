<?php

namespace View;

class ViewAll {
	
	public function render($data)
	{
		
		
		$count = count($data);
		for ($i = 0; $i < $count; $i++)
		{
			$id = $data[$i]['id_post'];
			$title = $data[$i]['title_post'];
			
			echo "<a href =' " . "ShowPostController.php?id=" . $id ." '> $title </a>" . "<br>" ;
			echo PHP_EOL;
					
		}
		
		}
}

