<?php
$name = $email = $reg_number = $course = $password ="" ;
    

    $conn = new mysqli("localhost", "root", "", "group8_db");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
    
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/f08ef06bb1.js" crossorigin="anonymous"></script>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

</head>

<body>
    

    <div class="container">
        <div class="heading">
            <h1>GROUP 8 FORM SUBMISSION</h1>
            <p> welcome to Group 8 Form Submission Pratical, 
                please fill the form below to submit your details</p>  
        </div>
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

            <label for="name">Name:</label> <i class="fa-solid fa-address-card"></i>
            <input type="text" id="username" name="username" required><br>

            <label for="email">Email:</label> <i class="fa-solid fa-envelope"></i>
            <input type="email" id="email" name="email" required><br>

            <label for="Reg Number">Reg Number:</label>
            <input type="number" id="Reg Number" name="reg_number" required><br>

            <label for="password">Password </label> <i class="fa-solid fa-unlock"></i>
            <input type="password" name="password" placeholder="password " required>

            <label for="course">Course:</label> <i class="fa-solid fa-book"></i>
            <select id="course" name="course" required>
                <option value="">Select a course</option>
                <option value="Computer Science">Peace And Conflict Resolution</option>
                <option value="Information Technology">Engineering Mathematics </option>
                <option value="Software Engineering">Software Development </option>
                <option value="Software Engineering">Laboratory Pratical III </option>
                <option value="Software Engineering">Digital Electronic Circuit </option>
                 <option value="Software Engineering">Renewable Energy systems and technology </option>
                  <option value="Software Engineering">Engineering Communication  </option>
            </select><br><br>

            <button type="submit" value="register">Submit</button>

       
        </form>
    </div>

</body>
</html>

<?php 

if($_SERVER["REQUEST_METHOD"] == "POST") {

$username = $_POST['username'];
$email = $_POST['email'];
$reg_number = $_POST['reg_number'];
$course = $_POST['course'];
$password = $_POST['password'];

if (empty($username))
    echo "Name is required";
elseif (empty($email))
    echo "Email is required";
elseif (empty($reg_number))
    echo "Registration number is required";
elseif (empty($course))
    echo "Course is required";
elseif (empty($password))
    echo "Password is required";

else{
    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO students (username, email, reg_number, course, password) 
            VALUES ('$username', '$email', '$reg_number', '$course', '$hash_password')";

    if(mysqli_query($conn, $sql)){
        echo "<p style='color:green;'>✅ Data inserted successfully</p>";
    } else {
        echo "<p style='color:red;'>❌ Error: " . mysqli_error($conn) . "</p>";
    }
}

}

mysqli_close($conn);
?>





 

 

    
       