<?php
namespace Dao;

use Model\Post;

class PostDao 
{

	public static function addPost(Post $post)
	{
		$result = [
				'success' => false,
				'message' => 'User is not registered! ',
		];
		try
		{
			$connection = DBConnection::getInstance();
			$queryInsert = "INSERT INTO employees
							(first_name, last_name, job_id, employee_id)
							VALUES (:fisrt_name, :last_name, :job_id, :employee_id);";
			$stm = $connection->prepare($queryInsert);
			$sucess = $stm->execute([
					'fisrt_name' => $employee->getFirstName(),
					'last_name' => $employee->getLastName(),
					'employee_id' => $employee->getEmployeeId(),
					'job_id' => $employee->getJobId(),
			]);
			$message = ($sucess) ? "User is registered! " : "User is not registered! ";
				
			$result = [
					'success' => $sucess,
					'message' => $message,
			];
		} catch (\PDOException $e) {
			$result['message'] = $e->getMessage();
		}
	
		return $result;
	}
}