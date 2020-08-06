<?php
  include "header.php";
?>


 <?php
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            if(strpos($fullUrl, "error=not_valid_filename")== true)
            {
                echo ' <div class="alert alert-danger alert-dismissible fade show" style="width: 500px;margin:auto;" role="alert">
                    <strong>Upload a valid file</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div><br>';
            }

 if (isset($_SESSION['name'])) 
            { 


            echo '<!DOCTYPE html>
            <html>
            <head>
            	<title>Insert Book Detals</title>
            	   <link rel="stylesheet" type="text/css" href="include_style/main.css">
            	
            	<style type="text/css">
            		body
            		{
            			background-color: #e5efe8;

            		}
            		.form-group
            		{
            			display: flex;
                		justify-content: center;
                		align-items: center;
            	}
            	.form{
            		margin-top: 20px;
            		padding-right:50px;
            		padding-left: 50px;
            		margin-right: 350px;
            		margin-left: 350px;
            		background-color: #d2e1e5;
                border-radius: 37px;
                box-shadow: rgba(0,0,0,0.8) 0 0 2px;
            	}
            	.btn{
            		align-items:center;
            	}
            	</style>
            </head>
            <body>

            <form action="insertion.php" method="POST" enctype="multipart/form-data" class="form">
            <center><h1>Insert Book Detals</h1></center>
            <div class="form-group col-lg-12">

              <fieldset class="form-group col-xs-4">
                <label>Title</label>
                <input class="form-control"
                  formControlName="minPower"
                  type="text"
                  name="title" 
                  placeholder="" />
                 
                
                <label>Author</label>
                <input class="form-control"
                  formControlName="minPower"
                  type="text"
                  name="author" 
                  placeholder="" />
             

             
                <label>Price</label>
                <input class="form-control"
                  formControlName="minPower"
                  type="text"
                  name="price" 
                  placeholder="" />

                    <label>Category</label>
                <input class="form-control"
                  formControlName="minPower"
                  type="text"
                  name="category" 
                  placeholder="" />



                   <label>Descriptions</label>
                <textarea class="description_style" type="text"   name="descriptions" ></textarea>
             						
             	<br>

             	<div class="file-field">
                <div class="btn-primary btn-sm float-left">
                  <input class="btn btn-dark" type="file" name="image">
                </div>
              </div>
               
             	<br><br><br>
              <center><button class="btn btn-primary" type="submit">Upload Cover Picture</button></center>

              </fieldset>
            </div>
            </form>
            </body>
            </html>';

}
else
{
  
   header("Location: login.php?Login_needed");
           exit();

}