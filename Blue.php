<?php 

session_start();

include("includes/db.php");
include("functions/functions.php");

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>The Bluegroup</title>
  <link rel="stylesheet" href="styles/bootstrap-337.min.css">
  <link rel="stylesheet" href="font-awsome/css/font-awesome.min.css">
  <link rel="stylesheet" href="styles/style.css">
</head>

<body>

 
 
   <!-- The video -->
<video autoplay muted loop id="myVideo">
  <source src="images/Clouds.mp4" type="video/mp4">
</video>

<!-- Optional: some overlay text to describe the video -->
<div class="content">
  <h1>COMING SOON</h1>
  <h2>BLUETECH</h2>
  <p>
          An exciting new brand of equipment for home and laboratory <br />
          KEEP WATCHING THIS SPACE!
        </p>
  <!-- Use a button to pause/play the video with JavaScript -->
  
  <a href="index.php" class="btn btn-primary">Back</a>
</div>
 
  <style>
    /* Style the video: 100% width and height to cover the entire window */
#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
  min-height: 100%;
}

/* Add some content at the bottom of the video/page */
.content {
  position: fixed;
  bottom: 0;
  background: rgba(0, 0, 0, 0.1);
  color: #f1f1f1;
  width: 100%;
  padding: 20px;
}
h1 {
  font-size: 5em;
    font-weight: 700;
}
  </style>
      
 

   
