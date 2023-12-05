<?php

$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "ecomerce";

$conn = new mysqli($servername, $username, $password, $dbname);



// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



?>















<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>product</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Handlee:wght@400&display=swap">
<style>
    @import url("https://fonts.googleapis.com/css2?family=Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap");

    * {

    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Spartan", sans-serif;
  }




  
    #logo a{
    text-decoration: none;
    color: #ffff;
    font-family: "Handlee",sans-serif;
    margin-left: -40px;
    margin-right: 100px;
   
  
  }

  #header{
    display: flex ;
    align-items: center;
    justify-content: space-between;
    padding: 20px 80px;
    background-color:#041e42;
    /*box-shadow: 0 5px 15px  rgba(0, 0, 0, 0.73);*/
    height: 90px;
    left: 0;
    flex-wrap: wrap;
    width: 100%;
    
    
    

    }

  
  .navbar{
    display: flex;
    align-items:center ;
    justify-content: center;
    justify-content: space-around;
    
    

  }
.navbar li{
  list-style: none;
  padding: 0 20px;

}
.navbar li a{
  text-decoration: none;
  font-size: 16px;
  font-weight: 600;
  color: white;

}
.navbar li a:hover{
  
  font-size:18px;
  
}
ul li:hover{
  background-color:#041e42;
  
}
ul li ul.dropdown li{
  display: block;
  color: black;
  margin-bottom: 15px;
 /* margin-top:15 px;*/
  
  

}
ul.dropdown li a:last-child{
  border: none;
}
 ul.dropdown{
  width: 100%;
  background: white;
  position: relative;
  z-index: 99;
  display: none;
  color: black;
  width: 150px;
  /*border-radius: 10px;*/
  border-left: none;
}
/*ul li:hover{
  background-color:#041e42;
  
}*/

ul li:hover ul.dropdown{
  display: block;

}
.dropdown li:hover{
  background-color: #F3EEEA;
  padding:10px;
}
ul.dropdown a{
  color:black;
  
}
 



.search-box{
    width: 400px;
    background: #fff;
    /*margin: 200px auto 0;*/
    border-radius: 20px;
}

 .form input{
  display: flex;

    width: 300px;
    flex: 1;
border-radius: 18px;
height: 40px;
width: 300px;
margin-right: 30px;
border: 0;
outline: 0;
font-size: 18px;
 


}
/*li  input{
    background: transparent;
    border: 0;
    outline: 0;
    width: 30px; 
   color:#041e42;
   font-size:22px ;
   cursor: pointer;
   margin-left:55px ;
}*/

.dropdown{
  border: 1px solid #555;
}


#category {
  
  padding: 8px; /* Adjust padding as needed */
  font-size: 16px; /* Adjust font size as needed */
  border: 1px solid #ccc; /* Add border for better visibility */
  border-radius: 4px; /* Optional: Add border-radius for rounded corners */
}
.abc{
  display: flex;
  justify-content: space-between;
}
button {
  padding: 8px; /* Adjust padding as needed */
  font-size: 16px; /* Adjust font size as needed */
  background-color: #fff; /* Add your desired background color */
  color: black; /* Add your desired text color */
  border: none; /* Remove default button border */
  border-radius: 4px; /* Optional: Add border-radius for rounded corners */
  cursor: pointer; /* Add pointer cursor on hover */
  
}





</style>
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
</head>
<body>
<section id="header">
    <div class="head">
      <ul class="navbar">
        <h2 id="logo"><a href="index.php">EVARA</a></h2>
        <li>
          <form action="" method="GET" class="form">
            <label for="search_name"></label>
            <input type="text" name="search_name" class="search" placeholder="Search by Name" >
        </li>
        <li id='catego'>
          <div class="abc">
            <select name="category" id="category">
              <option value="all">All</option>
              <option value="Clothes">Clothes</option>
              <option value="Shoes">Shoes</option>
              <option value="Accessories">Accessories</option>
            </select>
            <button type="submit">Filter</button>
          </div>
        </li>
      </form>
      <li><a href="shop.php">Shop</a></li>
      <li><a href="about.html">About us</a></li>
      <li><a href="contact.html">contact us</a></li>
      <li><a href="cart.html"><i class="fas fa-shopping-bag" style="color: white;"></i></a></li>
      <li><a href="profile.html"><i class="fas fa-user" style="color: #ffffff;"></i></a>
        <ul class="dropdown">
          <li><a href="login.php">log in</a></li>
          <li><a href="UserRegister.php">sign up</a></li>
        </ul>
      </li>
      </ul>
    </div>
  </section>
    
</body>
</html>