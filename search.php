

<?php
 	include "header.php";
?>


<?php
 if (isset($_SESSION['name'])) 
            { 

            echo '<!DOCTYPE html>
<html>
<head>
	<title>View Items</title>
		<meta charset="UTF-8">
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

		<style type="text/css">
			table{
				border: 1px solid black;
				  border-spacing: 5px;
				border-collapse: collapse;
				width: 70%;
				/*text-align: center;*/
				color: #588c7e;
				color: black;
				font-family: monospace;
				font-size: 25px;
				/*text-align: left;*/
				table-layout: fixed


			}
			
			th{

				background-color: #2ED6F7;
				/*color: white;*/
				color: #060600;
				/*text-align: center;*/
			}
				tr:nth-child(even){background-color: #f2f2f2;
				}

					
			form.example button 
			{
						  float: left;
						  width: 20%;
						  padding: 10px;
						  background: #2196F3;
						  color: white;
						  font-size: 17px;
						  border: 1px solid grey;
						  border-left: none;
						  cursor: pointer;
			}

			form.example input[type=text] 
			{
						  padding: 10px;
						  font-size: 17px;
						  border: 1px solid grey;
						  float: left;
						  width: 60%;
						  background: #f1f1f1;
			}

		</style>
</head>

<body>';
	?>
	


<?php
   $con = mysqli_connect('localhost','root','','bs');

        // $street = $row ['author'];

			$index1="book_id";
			$index2="title";
			$index3="author";
			$index4="price";
			$index5="image";
		 	$url = "http://localhost/admin_test/image/";
		 	 
echo '<br>';

if(isset($_GET['search_book_from_view'])) {
	echo '<bold><center><h1 style="color: #FA7D0F">View Items</h1></center></bold>

	
	<center>

	<table class="table_name_content" border="1px">
		<!-- <th>BookId</th> -->
		<th>Title</th>
		<th>Author</th>
		<th>Price</th>
		<th>Image</th>
	</table>
	<!-- ==============Search================================== -->
	 
<nav class="navbar navbar-light bg-light" style="margin:auto;max-width:300px">
  <form class="form-inline" action="search.php?you_search=" method="GET">
    <input class="form-control mr-sm-2" type="text" placeholder="Search.." name="search_book_from_view" >
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
  </form>
</nav>
		  <!-- ========================================================= -->';
    $search = $_GET['search_book_from_view'];
    $search = preg_replace("#[^0-9a-z]i#","", $search);

    $query = mysqli_query($con,"SELECT * FROM book WHERE title LIKE '%$search%' OR author LIKE '%$search%'") or die ("Could not search");
    $count = mysqli_num_rows($query);
    echo '<br>';
    if($count == 0){
     	echo "<center><h2>Nothing Found </h2></center>";

    }else{

      while ($row = mysqli_fetch_array($query)) 
      {
      // 		echo $row[$index1];
      // 		echo "<br>";


				echo '<br>';
				echo '<center>';
				echo '<table border="1px">' ;
					// echo "<td> $row[$index1]<td>";
					echo "<th colspan='300'> $row[$index2]</th>";
					echo "<th colspan='300'> $row[$index3]</th>";
					echo "<th colspan='300'> Rs $row[$index4]</th>";
					echo "<th colspan='300'> <img 

					src=".$url.$row[$index5]."


					width='100px' height='100px'></th>";
					echo '<br>';
				// echo "$row[$index5]";
				echo '<br>';
		
				echo '</table>';

				echo '</center>';

 
      }
      

    }

  }



if(isset($_GET['search_book_from_update'])) {
	echo '<bold><center><h1 style="color: #FA7D0F">Edit Items</h1></center></bold>

	
	<!-- <form action="editform.php" method="POST" enctype="multipart/form-data"> -->
	<center>
	<table class="table_name_content" border="1px">
		<!-- <th>BookId</th> -->
		<th colspan="300">Title</th>
		<th colspan="300">Author</th>
		<th colspan="300">Price</th>
		<th colspan="300">Image</th>
		<th colspan="300">Update Item</th>
		
	</table>
	</center>
	<!-- ==============Search================================== -->
	 
<nav class="navbar navbar-light bg-light" style="margin:auto;max-width:300px">
  <form class="form-inline" action="search.php?you_search=" method="GET">
    <input class="form-control mr-sm-2" type="text" placeholder="Search.." name="search_book_from_update" >
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
  </form>
</nav>
		  <!-- ========================================================= -->';
    $search = $_GET['search_book_from_update'];
    $search = preg_replace("#[^0-9a-z]i#","", $search);

    $query = mysqli_query($con,"SELECT * FROM book WHERE title LIKE '%$search%' OR author LIKE '%$search%'") or die ("Could not search");
    $count = mysqli_num_rows($query);
    echo '<br>';
    if($count == 0){
     	echo "<center><h2>Nothing Found </h2></center>";

    }else{

      while ($row = mysqli_fetch_array($query)) 
      {

      		// ====This id is taken from primary key to set get post in other page=========	
				$real_pass_id = $row[$index1];
				$title_pass = $row[$index2];
				$author_pass = $row[$index3];
				$price_pass = $row[$index4];
				// echo $real_id;
			$url = "http://localhost/admin_test/image/";


				// ==============================
				echo '<br>';
				echo '<center>';
				echo '<table border="1px">' ;
					// echo "<td > $row[$index1]<td>";
					echo "<th colspan='300'> $row[$index2]</th>";
					echo "<th colspan='300'> $row[$index3]</th>";
					echo "<th colspan='300'> Rs $row[$index4]</th>";
					echo "<th colspan='300'> <img 
													src=".$url.$row[$index5]."
					width='100px' height='100px'></th>";
					// This will pass the primary id of book to edit_update.php -->-->
					echo '<th colspan="300 ""><a href="edit_update.php?'
									?>
							<?php 
							echo "id_passfrom_url=".$real_pass_id;echo "&";
							echo "title_passfrom_url=".$title_pass;echo "&";
							echo "author_passfrom_url=".$author_pass;echo "&";
							echo "price_passfrom_url=".$price_pass;

							 ?> 
							<?php echo '">Edit</a></th>';

					echo '<br>';

				echo '</table>';

				echo '</center>';
   }
      

    }

  }



if(isset($_GET['search_book_from_delete'])) {

echo '<meta charset="UTF-8">
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
			

			
			th{

				background-color: #2ED6F7;
				/*color: white;*/
				color: #060600;
				/*text-align: center;*/
			}
			
				tr:nth-child(even){background-color: #f2f2f2;
				}

		
		</style>
</head>
<body>
	<bold><center><h1 style="color: #FA7D0F">Delete Items</h1></center></bold>

	<!-- <table border="1" cellspacing="0" width="80%"></table> -->

	<!-- ==============Search================================== -->
	 
<nav class="navbar navbar-light bg-light" style="margin:auto;max-width:300px">
  <form class="form-inline" action="search.php?you_search=" method="GET">
    <input class="form-control mr-sm-2" type="text" placeholder="Search.." name="search_book_from_delete" >
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
  </form>
</nav>
		  <!-- ========================================================= -->
		  
	<form action="delete_from_database.php" method="POST">
	<center>
	<table class="table_name_content" border="1px">
		<!-- <th>BookId</th> -->
		<th>Title</th>
		<th>Author</th>
		<th>Price</th>
		<th>Image</th>
		<th>Select the item to Delete</th>
	</table>


	</center>
';      

 	$search = $_GET['search_book_from_delete'];
    $search = preg_replace("#[^0-9a-z]i#","", $search);

    $query = mysqli_query($con,"SELECT * FROM book WHERE title LIKE '%$search%' OR author LIKE '%$search%'") or die ("Could not search");
    $count = mysqli_num_rows($query);

			$i = 1;
			$index1="book_id";
			$index2="title";
			$index3="author";
			$index4="price";
			$index5="image";
 			echo '<br>';
 			$url = "http://localhost/admin_test/image/";
    echo '<br>';
    if($count == 0){
     	echo "<center><h2>Nothing Found </h2></center>";

    }else{

      while ($row = mysqli_fetch_array($query)) 
      {
      	// echo '<br>';
				echo '<center>';
				echo '<table border="1px">' ;
					// echo "<td> $row[$index1]<td>";
					echo "<th colspan='1'> $row[$index2]</th>";
					echo "<th colspan='1'> $row[$index3]</th>";
					echo "<th colspan='1'> Rs $row[$index4]</th>";
					echo "<th colspan='1'> <img 
					src=" . $url.$row[$index5]. "


					 width='100px' height='100px'></th>";
					echo "<th><input type='checkbox' name='b$i' id='b$i' value='$row[$index1]' /></th>";
				echo '</table>';
				echo '</center>';
				$i++;

    }
    echo '<!-- For delete item view -->
<center>
<table class="Delete">
	<th colspan="2"></th>
	<th><input type="submit" placeholder="" value="Remove" /></th>
	<th colspan="2"></th>
</table>
</center>
</form>


</body>
</html>';
}
}


// ===========if user is not logged============
 }



            
        else{

           header("Location: login.php?Login_needed");
           exit();
        }

  





?>
