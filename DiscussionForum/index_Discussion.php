<?php
require('connection.php');
session_start();
$conn=mysqli_connect("localhost","root","","data");

if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $comment = $_POST["comment"];
    $date = date('F d, Y, h:i:s A');
    $reply_id = $_POST["reply_id"];

    $query= "INSERT INTO tb_data VALUES('', '$name', '$comment', '$date', '$reply_id')";
    mysqli_query($conn,$query);
}
?>
<!doctype html>
<html lang="en">
<head>
  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
          crossorigin="anonymous">
    <link href="DiscussionStyle.css" rel="stylesheet">
</head>

<header>
    <?php
        include('nav_header.php');
    ?>
</header>

<style>
    .card-container {
    display: flex;
    justify-content: space-around; 
}

.card {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
    width: 30%; 
    margin: 10px; 
}

.card:hover {
    box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}

.container {
    width: 100%;
    padding: 2px 16px;
}
.center-container {
display: flex;
justify-content: center;
align-items: center;

}

h2 span {
    margin-right: 20px; 
    display: inline-block;
    padding: 10px 20px;
    color: black;
    font-family: 'Arial', sans-serif; 
    font-weight: bold;
    font-size: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
    transition: background-color 0.3s ease;
}
h2 span:hover {
    background-color: #2ecc71; 
}

.submit {
    background-color: #4caf50;
    color: #fff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin: 0 auto; 
    display: block; 
}

.comment, .reply {
    border: 1px solid #ccc;
    margin: 10px 0;
    padding: 10px;
    border-radius: 4px;
}

.reply {
    margin-left: 20px;
}

.reply button {
    background-color: #3498db;
    color: #fff;
    padding: 5px 10px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.card-container {
display: flex;
justify-content: space-around; 
}

.card {
box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
width: 30%; 
margin: 10px; 
}

.card:hover {
box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
}

.container {
width: 100%;
padding: 2px 16px;
}
.center-container {
display: flex;
justify-content: center;
align-items: center;

}

h2 span {
margin-right: 20px; 
display: inline-block;
padding: 10px 20px;
color: black;
font-family: 'Arial', sans-serif; 
font-weight: bold;
font-size: 20px;
border-radius: 8px;
box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); 
transition: background-color 0.3s ease;
}
h2 span:hover {
background-color: #2ecc71; 
}

label {
display: block;
margin-bottom: 5px;
}
form {
    margin-top: 40px;
    padding: 15px;
    border: 1px solid #ddd;
     border-radius: 8px;
     background-color: #DDE1E1;
}

input,
textarea,
select {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

.submit {
background-color: #4caf50;
color: #fff;
padding: 10px 15px;
border: none;
border-radius: 4px;
cursor: pointer;
margin: 0 auto; 
display: block; 
}

.comment, .reply {
border: 1px solid #ccc;
margin: 10px 0;
padding: 10px;
border-radius: 4px;
}

.reply {
margin-left: 20px;
}

.reply button {
background-color: #3498db;
color: #fff;
padding: 5px 10px;
border: none;
border-radius: 4px;
cursor: pointer;
}

* {
margin: 0%;
padding: 0%;
box-sizing: border-box;
text-decoration: none;
font-family: Arial, Helvetica, sans-serif;
}
</style>

<body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>

        
    <br>
    <div class="center-container">
        <h2>
            <span>Connect</span>
            <span>Discuss</span>
            <span>Resolve</span>
        </h2>
    </div>
    <br>

    <div class="card-container">
        <div class="card">
            <img src="images/img_avatar.png" alt="Avatar" style="width: 100%;">
            <div class="container">
                <h4><b>Mihir Patki</b></h4>
                <p>Quantitative Expert</p>
            </div>
        </div>

        <div class="card">
            <img src="images/img_avatar2.png" alt="Avatar" style="width: 100%;">
            <div class="container">
                <h4><b>Sakshi Maskar</b></h4>
                <p>Reasoning Expert</p>
            </div>
        </div>

        <div class="card">
        <img src="images/img_avatar.png" alt="Avatar" style="width: 100%;">
        <div class="container">
            <h4><b>Shriraj Khochage</b></h4> 
            <p>Verbal Expert</p> 
        </div>
    </div>

    <div class="card">
        <img src="images/img_avatar.png" alt="Avatar" style="width: 100%;">
        <div class="container">
            <h4><b>Tanay Chougale</b></h4> 
            <p>Non-verbal Expert</p> 
        </div>
    </div>

    <div class="card">
        <img src="images/img_avatar2.png" alt="Avatar" style="width: 100%;">
        <div class="container">
            <h4><b>Aarya teli</b></h4> 
            <p>Logical Expert</p> 
        </div>
    </div>

    <div class="card">
        <img src="images/img_avatar.png" alt="Avatar" style="width: 100%;">
        <div class="container">
            <h4><b>Soham Page</b></h4> 
            <p>DI Expert</p> 
        </div>
    </div>


    </div>

    <br>
    <div class="container">
        <?php
        $datas = mysqli_query($conn, "SELECT * FROM tb_data WHERE reply_id=0");
        foreach ($datas as $data) {
            require 'comment.php';
        }
        ?>

        <form action="" method="post">
            <h2 id="title" style="text-align: center;">Ask your doubts</h2>
            <br>
            <input type="hidden" name="reply_id" id="reply_id">
            <input type="text" name="name" placeholder="Enter your name">
            <textarea name="comment" placeholder="Write your doubts"></textarea>
            <button type="submit" name="submit" class="submit" style="margin: 0 auto;">Submit</button>
        </form>
    </div>

    <script>
        function reply(id, name) {
            title = document.getElementById('title');
            title.innerHTML = "Reply to " + name;
            document.getElementById('reply_id').value = id;
        }
    </script>

</body>
</html> 

