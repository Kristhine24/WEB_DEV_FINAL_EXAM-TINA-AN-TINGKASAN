<?php
	session_start();
	include_once('database.php');

	if(isset($_POST['edit'])){
		$database = new Connection();
		$db = $database->open();
		try{
			//make use of prepared statement to prevent sql injection
            $sql = $db->prepare("UPDATE animals SET name = :name, color = :color, type_id = :type_id, number_of_legs = :number_of_legs , remarks =:remarks WHERE id = :id_ani");  

            $sql->bindParam(':name', $_POST['name']);
            $sql->bindParam(':color', $_POST['color']);
			$sql->bindParam(':type_id', $_POST['type_id']);
			$sql->bindParam(':number_of_legs', $_POST['number_of_legs']);
            $sql->bindParam(':remarks', $_POST['remarks']);
            $sql->bindParam('id_ani', $_GET['id'], PDO::PARAM_INT);
			$_SESSION['message'] = ( $sql->execute()) ? 'Services updated succesfully' : 'Something went wrong. Cannot add services.';	
	    
		}
		catch(PDOException $e){
			$_SESSION['message'] = $e->getMessage();
		}

		//close connection
		$database->close();
	}

	else{
		$_SESSION['message'] = 'Fill up add form first';
	}

	header('location: index.php');
	
?>