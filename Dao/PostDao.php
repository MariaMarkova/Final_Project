<?php
namespace Dao;

use Model\Post;
require '..\db\DBConnection.php';
class PostDao 
{

	public static function addPost(Post $post)
	{
		try
		{
			$connection = \DBConnection::getInstance();
			$queryInsert = "INSERT INTO posts
							(title_post, year_of_manufacture, price, description_post,id_user,	main_picture)
							VALUES (:title, :year, :price, :description,:userId,:mainPicture);";
			$stm = $connection->prepare($queryInsert);
			$sucess = $stm->execute([
					'title' => $post->getTitle(),
					'year' => $post->getYear(),
					'price' => $post->getPrice(),
					'description' => $post->getDescription(),
					'userId' => 1,
					'mainPicture' => $post->getMainPicture()
			]);
			$postId = $post->setId($connection->lastInsertId());
		
				
			
		} catch (\PDOException $e) {
			echo  $e->getMessage();
		}
		
	
	}
	
	public static function addPictures($array , $id)
	{
		
		try
		{
			$connection = \DBConnection::getInstance();
			$insertQuery =  "INSERT INTO pictures
							(url_pic,id_post) VALUES (:url,:id);";
			foreach ($array as $key => $picture)
			{
				$stm=$connection->prepare($insertQuery);
				$sucess = $stm->execute([
						'url' => $picture,
						'id' =>$id
				]);
			}
		}catch (\PDOException $e) {
			echo  $e->getMessage();
		}
	}
}