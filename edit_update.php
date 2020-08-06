<?php
session_start();
?>

 <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

   

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
<?php

if (isset($_SESSION['name'])) 
            { 
 
			echo '
				<head>
				<!DOCTYPE html>
				<html>
				<head>
					<title>Update Items</title>
						<meta charset="UTF-8">
						<style type="text/css">
							/*Remove input desing*/
							input[type=button], input[type=submit], input[type=reset] {
									  background-color: #4CAF50;
				  					border: none;
				  						color: white;
				  					padding: 16px 32px;
				  					text-decoration: none;
				  					margin: 4px 2px;
				  					cursor: pointer;
				  				}
							table{
								border: 1px solid black;
								  border-spacing: 5px;
								border-collapse: collapse;
								width: 70%;
								/*text-align: center;*/
								color: #588c7e;
								color: red;
								font-family: monospace;
								font-size: 25px;
								text-align: left;
								table-layout: fixed


							}
							body{
								// background: url("https://images.pexels.com/photos/949587/pexels-photo-949587.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500");
								background-color: #e5efe8;

								}
							th{

								background-color: #2ED6F7;
								/*color: white;*/
								color: #060600;
								/*text-align: center;*/
							}
							.
								tr:nth-child(even){background-color: #f2f2f2;

							
						</style>

				</head>
				<body>';

				?>

					<?php
									

							   $con_edit = mysqli_connect('localhost','root','','bs');
							   // This id from the updateform.php 
							   $id_get = $_GET['id_passfrom_url'];
							   $title_get = $_GET['title_passfrom_url'];
							   $author_get = $_GET['author_passfrom_url'];
							   $price_get = $_GET['price_passfrom_url'];
							   // echo $id;
							   $select = mysqli_query($con_edit,"select * from book where book_id='$id_get'");
							   $row = mysqli_fetch_assoc($select);
				?>

					<bold><center><h1 style="color: #FA7D0F">Edit Items</h1></center></bold>

					
					<!-- <form action="editform.php" method="POST" enctype="multipart/form-data"> -->
					<center>
					<table class="table_name_content" border="1px">
						<!-- <th>BookId</th> -->
						<th >Title</th>
						<th >Author</th>
						<th >Price</th>						
						<!-- <th >Description</th> -->
						<th >Image</th>
						<th >New Image</th>
						
					</table>
					</center>




				<center>
					<form action="edit_update_last.php?id_get_passed=<?php echo $id_get;echo '&';
													echo 'title_get_passed=';echo $title_get;echo '&';
													echo 'author_get_passed=';echo $author_get;echo '&';
													echo 'price_get_passed=';echo $price_get;
					?>" method="POST" enctype="multipart/form-data">

								<table border="1px">

									
										<th >
												<input class="form-control" placeholder="New Title" type="text"  name="title_edit" value ="Title" ></input><?php echo '<p style="font-size: 15px;">'.$row['title']; ?>
										</th>
										<th >
												<input class="form-control" placeholder="New author" type="text" name="author_edit" value ="Author"></input><?php echo '<p style="font-size: 15px;">'.$row['author']; ?>
										</th>
										<th >
												<input class="form-control" placeholder="New price"  type="text" name="price_edit" value ="Price"></input><?php echo '<p style="font-size: 15px;">'.$row['price']; ?>
										</th>
									
										<th >
												
												 <img name="image_edit" src="<?php echo './image/'.$row['image'];  ?>" width='100px' height='100px'>

										</th>
										<th >
										<input class="btn btn-dark" style="width: 140px;" type='file' name='image' value='Upload' placeholder="Upload" />
									</th>
								</table>
								
									<input class="btn btn-warning" type="submit" name="submit" value="update" name="update">
				</center>
				</form>


				<?php

			}
			else
			{

           header("Location: login.php?Login_needed");
           exit();
			}


