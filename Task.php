<?php 

class Task extends DB{
	
	// Mengambil data
	function getTask(){
		// Query mysql select data ke tb_to_do
		$query = "SELECT * FROM tb_to_do";

		// Mengeksekusi query
		return $this->execute($query);
	}

	// function to add new task
	function addTask($taskName, $taskDetails, $taskSubject, $taskPriority, $taskDeadline){
		// query insert
		$query = "INSERT INTO `tb_to_do`
					(`id`, `name_td`, `details_td`, `subject_td`, `priority_td`, `deadline_td`, `status_td`)
					VALUES
					(NULL, '$taskName', '$taskDetails', '$taskSubject', '$taskPriority', '$taskDeadline', 'Belum');";

		// execute the query
		return $this->execute($query);
	}
	
	// function to delete task
	function deleteTask($id){
		// query delete
		$query = "DELETE FROM tb_to_do WHERE id=$id";

		// execute the query
		return $this->execute($query);
	}

	// function to change status
	function changeTaskStatus($id){
		// query update
		$query = "UPDATE tb_to_do SET status_td='Sudah' WHERE id=$id";

		// execute the query
		return $this->execute($query);
	}

	// function to sorting task
	function sortingTask($mode, $category){
		// query select order by
		if ($mode == 1) {
			$query = "SELECT * FROM tb_to_do ORDER BY $category";
		}else {
			$query = "SELECT * FROM tb_to_do ORDER BY
						(CASE
						WHEN $category = 'High' THEN 1
						WHEN $category = 'Medium' THEN 2
						ELSE 3 END)";
		}

		// execute the query
		return $this->execute($query);
	}
}

?>