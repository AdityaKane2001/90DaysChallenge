<?php
require_once 'pdo.php';
//require 'utils.php';
session_start();
 ?>


 <!doctype html>
 <html lang="en">
   <head>
   <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

     <title>Trackr</title>
   </head>
   <body>
     <nav class="navbar navbar-expand-lg navbar-light bg-dark">
   <div class="container-fluid">
     <a class="navbar-brand" style= "color: #919191; font-size: 30px;" href="#">Trackr</a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse" id="navbarNavDropdown">
       <div style="position: absolute;right: 20px;">


       <ul class="navbar-nav">
         <li class="nav-item">
           <a class="nav-link"  style="color: #919191;"aria-current="page" href="index.php">Home</a>
         <li class="nav-item">
         </li>
        <?php echo('<li class="nav-item dropdown">
             <a style="color: #919191;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Welcome, '.$_SESSION['username'].'
             </a>
             <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

               <li><a class="dropdown-item" href="logout.php">Logout</a></li>

             </ul>
           </li>');?>

         </li>

       </ul>
         </div>
     </div>
   </div>
 </nav>


 <!-- Actual page goes here-->
 <div class="container">


<!--
   <center>
   <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#addModal">
   + Add challenge
 </button>
</center>
   <div id="addModal" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Create a new challenge</h5>
        <button type="button" class="btn btn-secondary btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <label for="">Name: </label><br><br>
            <label for="">Days: </label>
          </div>
          <div class="col-md-6">
            <input type="text" id="name" name="name"><br><br>
            <input type="number" id="days" name="days" min=1 max=90>

          </div>



        </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="addChallenge();" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Create challenge</button>
      </div>
    </div>
  </div>
</div>
-->

<div class="row">
  <div style="border-right-style: solid; border-color: black;border-width: 1px;" class="col-md-2">
    this is a test <br><br><br><br>
  </div>
  <div class="col-md-10">
    <?php
      $_SESSION['challenges']


     ?>
  </div>

</div>


 </div>


   <footer class="footer mt-auto py-3 bg-dark"
       style="color:#919191;font-family: Verdana, Geneva, Tahoma, sans-serif;">






       <div class="footer-copyright text-center py-3"
         style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
         <p>Made with 	<span style="color:red;">&#x2764;</span> by Aditya Kane and Shantanu Deshpande</p>
       </div>

     </footer>


     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
     <script src="tracker.js" charset="utf-8"></script>
   </body>
 </html>
