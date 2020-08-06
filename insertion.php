<?php
session_start();
?>
<?php
// Initialize the session

  if (isset($_SESSION['name'])) 
            { 

              $title = $_POST['title'];
              $category = $_POST['category'];
            	$author = $_POST['author'];
            	$price = $_POST['price'];
              $descriptions = $_POST['descriptions'];
            	// $name = $_FILES['image']['name'];
            	// $tmpname = $_FILES['image']['tmp_name'];
            // ====================random name ganerator in image file=========
            

            function makeRandomString($max=6) {
                $i = 0; //Reset the counter.
                $possible_keys = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
                $keys_length = strlen($possible_keys);
                $str = ""; //Let's declare the string, to add later.
                while($i<$max) {
                    $rand = mt_rand(1,$keys_length-1);
                    $str.= $possible_keys[$rand];
                    $i++;
                }
                return $str;
            }
            $random_name_at_last =  makeRandomString();
            // echo $random_name_at_last;

            // ==========================================


                // name of book book_id  form the database to help me to easy edit
                // =======================================
                // $con_for_book_id_change_name = mysqli_connect('localhost','root','','bs');
                // $query_for_book_id_change_name = "select max(book_id) from book;";
                // $result_for_book_id_name = mysqli_query($con_for_book_id_change_name,$query_for_book_id_change_name);
                // $row = mysqli_fetch_array($result_for_book_id_name);
                // $bookid_name_of_book = $row[0]+1;
                // // echo $row;
                // echo '<br>';
                // echo $bookid_name_of_book; echo '&nbsp;&nbsp;&nbsp;  ----> &nbsp;&nbsp;';




                // =====================================
            // form here the image upload
                    if(isset($_FILES['image']))
                    {

                        $error = arraY();
                        $file_name = $_FILES['image']['name'];
                        $file_size = $_FILES['image']['size'];
                        $file_tmp = $_FILES['image']['tmp_name'];
                        $file_type = $_FILES['image']['type'];

                        // echo $file_type;
                        //             echo "<br>";
                        // echo $file_tmp;
                        //             echo "<br>";
                        // echo $file_name;
                        //             echo "<br>";
                        // echo $file_size;

                        $target_dir = "image/";

                        $target_file = $target_dir . basename($_FILES["image"]["name"]);
                        $file_ext = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


                        // $file_ext = strtolower(end(explode('.', $_FILES['image']['name'])));

                        // echo "<br>";
                        // echo "<br>";
                        // echo $file_ext;

                        $extension = array("png","jpg","jpeg");
                                    if(in_array($file_ext,$extension) == false)
                                    {

                                                $error[]= "Please choose the image";
                                                // echo "<br>";
                                                // echo "Please upload the valid file jpg";
                                                echo '<script> 
                                                        window.location.replace("http://localhost/admin_test/insertForm.php?error=not_valid_filename");
                                                  </script>';
                                                exit();

                                    }
                                if(empty($error) == true)
                                {
                                    if (( $file_type == 'image/jpeg' || $file_type == 'image/png' || $file_type == 'image/jpg'))
                                     {
                                   
                                    
                                    // i parse the book_id from here

                                    move_uploaded_file($file_tmp, $target_dir.$random_name_at_last.".".$file_ext);
                                    $path = $_SERVER['HTTP_REFERER'];
                                    // echo $path;
                                    $actual_path = $random_name_at_last.".".$file_ext;
                                    // echo $bookid_name_of_book.".".$file_ext;
                                   

                                  
                               		$con_insert_file = mysqli_connect('localhost','root','','bs');
                                    // title,author,image,price
            						          $query = "INSERT INTO BOOK(title,author,image,price,category,description) VALUES('$title','$author','$actual_path','$price','$category','$descriptions');";

                      						$run = mysqli_query($con_insert_file,$query);


                                                 if($run)
                                                 {

                // To create a comment section by bood_id
                // =======================================
                $con_for_book_id_change_name = mysqli_connect('localhost','root','','bs');
                $query_for_book_id_change_name = "select max(book_id) from book;";
                $result_for_book_id_name = mysqli_query($con_for_book_id_change_name,$query_for_book_id_change_name);
                $row = mysqli_fetch_array($result_for_book_id_name);
                $bookid_name_of_book = $row[0]; //this will give last book_id
                // echo $row;




                      $servername = "localhost";
                      $username = "root";
                      $password = "";
                      $dbname_1 = "bs";

                      // Create connection
                      $conn = new mysqli($servername, $username, $password, $dbname_1);
                      // Check connection
                      if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                      }

                      // Create database
                      // sql to create table for user for cart 
                    $sql = "CREATE TABLE `$bookid_name_of_book` (
                    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    user_name VARCHAR(30) NOT NULL,
                    comemnts VARCHAR(400) NOT NULL,                    
                    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                    )";
                      
                      if ($conn->query($sql) === TRUE) {
                        echo "Database created successfully";
                      } else {
                        echo "Error creating database: " . $conn->error;
                      }

                      $conn->close();


                                            
                                                     echo '<script> 
                                                        window.location.replace("http://localhost/admin_test/dashboard.php?success=book_uploaded_sussfully");
                                                  </script>';
                                                     exit();
                                                    
                                                     // exit();
                                                  }
                                                  else
                                                  {
                                                           echo "Not uploaded";
                                                          // echo $actual_path;
                                                          echo "<br>";
                                                          exit();
                                                  }
                                        
                                        
                                       

                                   }
                                   else
                                   {
                                    echo "<br>";
                                     echo "content type didn\'t match";
                                   }
                        }
                    }




            ?>

            <!-- clear the history for resubmission repeat while refresing the page -->

            <script type="text/javascript">
               				if ( window.history.replaceState ) {
                    				window.history.replaceState( null, null, window.location.href );
                			}
            </script>

            <?php
            }



            
        else{

           header("Location: login.php?Login_needed");
           exit();
        }

?>
        




