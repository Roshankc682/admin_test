<?php
session_start();
?>

<?php
 if (isset($_SESSION['name'])) 
            { 
				$servername = "localhost";
				$username = "root";
				$password = "";
				$dbname = "bs";

				// Create connection
				$conn = new mysqli($servername, $username, $password, $dbname);
				// Check connection
				if ($conn->connect_error) {
				    die("Connection failed: " . $conn->connect_error);
				}

					// size will see how many data is selected
					$size = sizeof($_POST);

					// echo $size;
					$i = 1;
					$j = 1;

					while ($i <= $size) 
					{
						
							$index = "b".$j;
							if(isset($_POST[$index]))
							{
								// BOOK ID from database is collected in array
								$bookid[$i] = $_POST[$index];
								// echo "work";

								$i++;
							}
							$j++;
				}
				// Now the delete from database is initilise
				$con_for_delete = mysqli_connect('localhost','root','','bs');
				$delete = 0;

				for($i=1;$i<=$size;$i++)
				{
					// This will delete the actual file from the computer
					$q = "SELECT * FROM BOOK where book_id=$bookid[$i]";
					$result = mysqli_query($con_for_delete,$q);
					$row = mysqli_fetch_assoc($result);
					$image = $row['image'];
					// echo $row['image'];
					// echo '<br>';
					// var_dump($row);
					$book_id_from_database = $row['book_id'];
					// echo $book_id_from_database;

				// Okay this good i got the last filename to delete
				// $name_of_image = basename($ \).PHP_EOL;
				// echo $name_of_image;


				// this is book id extract from array and need to delete by using for loop just made it
				// echo $bookid[1];

					unlink("./image/" .$row['image']);

					$sql = "DELETE FROM BOOK WHERE book_id='$book_id_from_database'";

							if ($conn->query($sql) === TRUE) {
							    
 								// echo '<script> 
         //                          window.location.replace("http://localhost/admin_test/delete.php?deleted=succesfully&';echo 'book_name='.$row['title']; ;echo '");
         //                         </script>';

                          		// exit();
							} else {
							    echo "Error deleting record: " . $conn->error;
							}

							// $conn->close();
				        	
                              // echo "hello_2";
                          		// exit();
						
					$sql = "DROP TABLE `$book_id_from_database`";

					if ($conn->query($sql) === TRUE) {
							    
 								echo '<script> 
                                  window.location.replace("http://localhost/admin_test/delete.php?deleted=succesfully&';echo 'book_name='.$row['title']; ;echo '");
                                 </script>';
								// echo "deleted";
                          		// exit();
							} else {
							    echo "Error deleting record: " . $conn->error;
							}

							$conn->close();
				        	
                              // echo "hello_2";
                          		exit();
				}

			}
			else
			{

           				header("Location: login.php?Login_needed");
           				exit();
			}





?>