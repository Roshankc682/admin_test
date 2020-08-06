<?php
 	include "header.php";
?>
<?php


if (isset($_SESSION['name'])) 
{ 

	if(empty($_GET['search_book_from_view'])) 
		{
			echo '<script>window.location.replace("http://localhost/admin_test/order.php?nope=nothing");</script>';


		}
		else
		{
		
			if(isset($_GET['search_book_from_view'])) 
			{
				$search = $_GET['search_book_from_view'];
	    		$search = preg_replace("#[^0-9a-z]i#","", $search);

	    		 $con = mysqli_connect('localhost','root','','bs');
	    		$query = mysqli_query($con,"SELECT * FROM user_deliver WHERE hash_token_for_client_for_ship LIKE '%$search%'") or die ("Could not search");
	    		$count = mysqli_num_rows($query);

	    		echo '<br>';
			    if($count == 0)
			    {
			    	echo '<nav class="navbar navbar-light bg-light" style="margin:auto;max-width:300px">
					  <form class="form-inline" action="search_client.php?you_search=" method="GET">
					    <input class="form-control mr-sm-2" type="text" placeholder="Search.." name="search_book_from_view" >
					    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
					  </form>
					</nav><div style="margin: 10px;">';
			     	echo "<center><h2>Nothing Found . Provide valid Token</h2></center>";

			    }
			    else
			    {

			    	echo '<nav class="navbar navbar-light bg-light" style="margin:auto;max-width:300px">
						  <form class="form-inline" action="search_client.php?you_search=" method="GET">
						    <input class="form-control mr-sm-2" type="text" placeholder="Search.." name="search_book_from_view" >
						    <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
						  </form>
						</nav><div style="margin: 10px;">
						<table class="table table-striped table-dark">
						  <thead>
						    <tr>
						      <th scope="col">S.N</th>
						      <th scope="col">Name</th>
						      <th scope="col">E-mail</th>
						      <th scope="col">Book Name</th>
						      <th scope="col">Total Cost</th>
						      <th scope="col">Token of Client</th>
						      <th scope="col">Time</th>
						      <th scope="col">Delete</th>
						    </tr>
						  </thead>';

			      while ($row = mysqli_fetch_array($query)) 
			      {
			      	echo '<form action="delete_order.php" method="post">
					    <tr>
					    
					      <th scope="row" value="'.$row['id'].'"> <input type="hidden" id="custId" name="S.N" value="'.$row['id'].'">'.$row['id'].'</th>
					      <td>'. $row['full_name'].'</td>
					      <td>'. $row['stripeEmail'].'</td>
					      <td>'. $row['book_name'].'</td>
					      <td><i class="fa fa-inr" aria-hidden="true"></i> '. $row['toal_cost_pass'].'</td>
					      <td>'. $row['hash_token_for_client_for_ship'].'</td>
					      <td>'. $row['time'].'</td>
					      <td><button type="submit" class="btn btn-danger" name="clicked" value="clicked">Delete</button></td>
					      
					    </tr>
					    </form>';

			      }
			      echo '</table>
						</div>';


			}
			}
			else
			{
				echo '<script>window.location.replace("http://localhost/admin_test/order.php?nope=nothing");</script>';
			}
		}
}
else
{
	       header("Location: login.php?Login_needed");
           exit();


}

?>