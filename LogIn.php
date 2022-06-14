
<html>
  <div class="log-form">
   <h2>Login to your account</h2>
    <form action = "index.php" method="post">
  <input type="text" required name="username" value = <?php echo isset($_Post['username'])?>>;

  <input type="password" required name="password" value = <?php echo isset($_Post['username'])?>>;

  <button name = logIn type="submit" class="btn">LogIn</button>
  <a class="forgot" href="#">Forgot Username?</a>
  </form>
 </div>
<!--end log form -->
</html>

<?php
session_start();
$UserName = Array("Granny","Grandpa","Grandson");
$Password = Array("Cats","Ball","Dog");
$Name = isset($_Post['Username'])? $_POST['Username']:'');
$Pass = isset($_Post['Password'])? $_POST['Password']:'');
if(isset($_POST['logIn']))
{
  LogIn($Name,$Pass,$UserName,$Password);
 
}

function LogIn($Name, $Pass,$UserName,$Password)
{
  $Logged=false;
  for($x=0;$x<3;$x++)
  {
    if((strcmp($UserName[$x],$Name)==0)&&(strcmp($Password[$x],$Pass)==0))
    {
      echo '<script>alert("You got your details ccorect")</script>';
      $Logged=true;
      header('Location: welcome.php');
      $_SESSION['name'] = $Name;
    }

  }
  if($Logged==false)
  {
    echo '<script>alert("You got your details inccorect")</script>';
    $_SESSION["Error"];
  }
}
?>