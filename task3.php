<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Currency Converter</title>
    <link rel="stylesheet" href="task3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">
    <link rel="icon" type="image/png" href="https://icons8.com/icon/AJxYYTuJtYDw/dollar-euro-exchange">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>

  <body id="b2">
    
  <nav class="navbar navbar-expand-lg bg-body-tertiary "data-bs-theme="dark" id="nav">
  <div class="container-fluid">
    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="padding-left:50px">
      <li class="nav-item">
          <a class="nav-link" href="#" style="color:gold; font-family: Brush Script MT ,cursive;font-size:30px ;margin-right:400px ">CURRENCY CONVERTER </a>
        </li>
        <li class="nav-item" >
          <a class="nav-link active" aria-current="page" href="#home" style="color:white;">Home</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link" href="#aboutus" style="color:white;">About US </a>
        </li>
        <li class="nav-item">
        <li class="nav-item">
          <a class="nav-link" href="#form" style="color:white;">Registration Form </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#contactus" style="color:white;">Contact Us </a>
        </li>
        

        
       
      </ul>
     
    </div>
  </div>
</nav>
  
    <?php
    
    ob_start(); 
    $emailErr="";$passwordErr="";$nameErr="";
    $name="";$email="";$password="";
    $emailErr1="";$passwordErr1="";$nameErr1="";
    $name1="";$email1="";$password1="";
  
  $servername = 'localhost';
  $username = 'Benish';
  $password ='Benish@123';
  $dbname = 'login';
  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);}

//for name
 if($_SERVER["REQUEST_METHOD"]=="POST"){
 if(isset($_POST['login'])){
  if(empty($_POST['name'])){
    $nameErr="Name is required";
  }
  else{
    $name=htmlspecialchars($_POST['name']);
    if(!preg_match("/^(?=.*[a-zA-Z])[a-zA-Z-' ]*$/", $name)){

    $nameErr="Only white spaces and letters are allowed";}
  

  

}
if(empty($_POST['email'])){
  $emailErr="Email_id is required";
}
else{
  $email=htmlspecialchars($_POST['email']);
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  }


  $email=htmlspecialchars($_POST['email']);
 $sql="SELECT *FROM login where email=?";
 $stm=$conn->prepare($sql);
 $stm->bind_param("s",$email);
 $stm->execute();
 $result = $stm->get_result();
 if($result->num_rows>0){
  $emailErr = "Please signup you have already created account withis email_id.";

  $stm->close();
 }
 


}
if(empty($_POST['password'])){
  $passwordErr="Password is required";}
  else{
    $password=htmlspecialchars($_POST['password']);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
   
    }
 
  

  if (empty($nameErr) && empty($emailErr) && empty($passwordErr) ) {

    $sql = "INSERT INTO login (`name`, `email`, `password`,`dateofjoin`) VALUES (?, ?, ?, CURRENT_TIMESTAMP())";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $hashedPassword);
    if ($stmt->execute()) {
        
      echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert1">
      <strong>Success!</strong> Your details have successfully create new account.
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  echo "<script>
          setTimeout(function() {
              window.location.href = 'task3.html';
          }, 3000);
        </script>";
             
    }
  
    $stmt->close();
  }
  }

 
//sign up
else if(isset($_POST['signup'])){
  if(empty($_POST['name1'])){
    $nameErr1="Name is required";
  }
  else{
    $name1=htmlspecialchars($_POST['name1']);
    if(!preg_match("/^(?=.*[a-zA-Z])[a-zA-Z-' ]*$/", $name1)){

    $nameErr1="Only white spaces and letters are allowed";}
    }
if(empty($_POST['email1'])){
  $emailErr1="Email_id is required";
}
else{
  $email1=htmlspecialchars($_POST['email1']);
  if (!filter_var($email1, FILTER_VALIDATE_EMAIL)) {
    $emailErr1 = "Invalid email format";
  }

 


}
if(empty($_POST['password1'])){
  $passwordErr1="Password is required";}
  else{
    $password1=htmlspecialchars($_POST['password1']);
    $hashedPassword1 = password_hash($password1, PASSWORD_DEFAULT);
    
   
    }
    ob_start();
  if (empty($nameErr1) && empty($emailErr1) && empty($passwordErr1) ) {

$sql = "SELECT * FROM login WHERE email=?";
 $stm=$conn->prepare($sql);
 $stm->bind_param("s",$email1);
 $stm->execute();
 $result1 = $stm->get_result();

 if($result1->num_rows>0){
 
  
  $row1 = $result1->fetch_assoc(); 
  $hashedPasswordFromDb = $row1['password']; 

  if (password_verify($password1 , $hashedPasswordFromDb)) {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert" id="alert1">
    <strong>Success!</strong> Your have successfully signin.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    
    echo "<script>
    setTimeout(function() {
        window.location.href = 'task3.html';
    }, 3000);
  </script>";
    }
    else{
 
           
           

    
        

          echo '<div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert2" style="visibility:visible;">
    <strong>Error!</strong> Your password is wrong.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  
  echo "<script>
  
  document.addEventListener('DOMContentLoaded', function () {
 
   
        div1=document.getElementById('fcontainer');
        document.getElementById('fcontainer1').style.display='block';
       
        div2=document.getElementById('fcontainer1');
        if (div1 && div2) {
             document.getElementById('fcontainer1').style.display='block';
           
            document.getElementById('fcontainer').style.display='none';
           
        }
        
    

  
});
 
                 setTimeout(function() {
                 document.getElementById('alert2').style.visibility = 'hidden';
  }, 2000);
  
</script>";    

    }
             

  $stm->close();
 
 
}
 
     
    
  
    
  }
  ob_end_flush();

}}
 
    ?>
    <section id="home">
      <div id="hs"> 
<span id="h1" style="font-size: 250px; font-family:Copperplate, Papyrus, fantasy"> W </span><span id="h2" style="font-size: 250px; font-family:Copperplate, Papyrus,fantasy"> e </span><span id="h3"  style="font-size: 250px; font-family:Copperplate, Papyrus,fantasy" > 
  l
</span><span id="h4"  style="font-size: 250px; font-family:Copperplate, Papyrus, fantasy" > c </span><span id="h5"  style="font-size: 250px;font-family:Copperplate, Papyrus, fantasy" > o </span><span id="h6"  style="font-size: 250px;font-family:Copperplate, Papyrus, fantasy" > m</span>
<span id="h7"  style="font-size: 250px;font-family:Copperplate, Papyrus, fantasy" > e </span>
      </div>
    </section>
 <section id="aboutus">
<div  id="ab">
<h1 style="text-align:center ;font-family:Copperplate, Papyrus, fantasy;font-size:40px;padding:40px;"> <b>About Us</b> </h1>
<p style="font-size:30px ;padding:20px;"> This website offers a simple and efficient currency conversion tool, allowing users to convert between four major
   currencies: US Dollar (USD), Euro (EUR), Indian Rupee (INR), and Kuwaiti
    Dinar (KWD). Designed for ease of use, the tool provides up-to-date exchange rates, 
    enabling accurate conversions for anyone needing quick insights into these currencies. 
    Just enter an amount in one currency, and the tool instantly calculates the equivalent in the other three, streamlining conversions
     for personal and professional use alike.</p>
</div>
</section>
<section id="form">
<div id='fcontainer' style="display:block;">

<h1 style="font-family:sans-serif;font-weight: bold; margin-top:60px;">Create your account</h1>
<p> Create account or sign in before currency conversion</p>
<form method="post">
<input type="hidden" name="login" value="1">
  <div class="mb-3">
  <label for="exampleInputName" class="form-label">UserName</label>
    <input type="name" class="form-control" id="exampleInputname2" name="name" aria-describedby="nameHelp"><span class="error">* <?php echo $nameErr; ?></span>

</div>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" name="email"><span class="error">* <?php echo $emailErr; ?></span>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

</div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword2" name="password"><span class="error">* <?php echo $passwordErr; ?></span>
  </div>
  <div class="mb-3">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck1" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>

  <div class="mb-31">
  <button type="submit" class="btn btn-primary"  id="submit" style="background-color:silver">Submit</button>
  </div>

</div>
</form>
<div id='sd'>
 <div class="mb-31">
  <button  type="button"  class="btn btn-primary" id="button5" style="background-color:silver">Sign in</button>
  </div>
  <div class="mb-31">
  <button type="button"   class="btn btn-primary1" id="button6" style="background-color:silver">Sign up </button>
  </div>
  </div>
  </div>
  <!--sign In-->
  <div id='fcontainer1' style="display:none;" >

  <h1 style="font-family:sans-serif;font-weight: bold; margin-top:60px;">SIGN IN </h1>
<form method="post" action='task3.php' onsubmit="validateForm(event)" >
<input type="hidden" name="signup" value="1">
  <div class="mb-3">
  <label for="exampleInputName" class="form-label">UserName</label>
    <input type="name" class="form-control" id="exampleInputname1" name="name1" aria-describedby="nameHelp"><span  class="error">* <span id="nameError" ><?php echo $nameErr1; ?></span></span>

</div>
<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email1"><span class="error">*  <span id="emailError"><?php echo $emailErr1; ?></span></span>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>

</div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password1"><span class="error">* <span id="passwordError"><?php echo $passwordErr1; ?></span></span>
  </div>
  <div class="mb-3">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
      <label class="form-check-label" for="invalidCheck">
        Agree to terms and conditions
      </label>
      <div class="invalid-feedback">
        You must agree before submitting.
      </div>
    </div>

  <div class="mb-31">
  <button type="submit" class="btn btn-primary1"  id="submit1"style="margin-top:30px;margin-left:70px;background-color:silver">Submit</button>
  </div>

</div>
</form>
<div id='sd'>
 <div class="mb-31">
  <button  type="button"  class="btn btn-primary" id="button51" style="background-color:silver">Sign in</button>
  </div>
  <div class="mb-31">
  <button type="button"  class="btn btn-primary" id="button61" style="background-color:silver">Sign up </button>
  </div>
  </div>
  </div>
</section>
  <section id ="contactus">

  <div id="cs">
    <div id="dh">
  <h1 style="font-family:Copperplate, Papyrus, fantasy;font-size:40px;"> <b>Contact  Us</b> </h1>
</div>
<div id="di" >
<a href="#" ><i class="fa-brands fa-telegram fa-4x"></i></a>
<a href="#" ><i class="fa-brands fa-facebook fa-4x"></i></a>
<a href="#" ><i class="fa-brands fa-twitter fa-4x"></i></a>
</div>
  </div>
</section>

<script src="taskphp.js"></script>   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>