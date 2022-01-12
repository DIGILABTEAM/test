<?PHP
$name = $_GET['name'];
$place = $_GET['place'];
$mob = $_GET['mob'];
$email = $_GET['email'];

// Database connection
$_servername = "localhost";
// $_username = "id17847083_laveta2allergy";
// $password = "New@20182018";
// $dbname = "id17847083_laveta2";
$_username = "root";
$password = "";
$dbname = "reg";
$con =  mysqli_connect($_servername,$_username,$password,$dbname);
if (!$con) 
{
    die("Error :".mysqli_connect_error());    
}else{
    // if ($empcode == $empcode1)
    // {
        $sql = "INSERT INTO `login`(`name`, `place`, `mob`, `email`) VALUES ('".$name."','".$place."','".$mob."','".$email."')";
        
        if(mysqli_query($con, $sql)) 
        {
            header('Location: ./quiz.html');
            echo "Successful enter";
        }
        else {
            echo"something went wrong";
        }
    // }
        // else 
        // {
        // echo "Incorrect Credential";
    // }
}
mysqli_close($con);

?>
