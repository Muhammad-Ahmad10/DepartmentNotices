<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'dbconnect.php';

class Login {
    private $email;
    private $password;
    private $conn;

    public function __construct($email, $password,$db) {
        $this->email = $email;
        $this->password = $password;
        $this->conn=$db;
    }

    public function validate() {
       
        
        $stmt = $this->conn->prepare('SELECT * FROM student WHERE semail = ? AND spassword = ?');


        // $query='SELECT * FROM student WHERE email = :email AND password = :password';
        
        // $student = mysqli_query($this->conn, $query);
        $stmt->bind_param('ss', $this->email, $this->password);
      //  $stmt->bindParam(':password', $this->password);
        $stmt->execute();
        $student = $stmt->fetch();
        
        if($student) {
            // If the email and password match a student account, redirect to the student dashboard
           

    

            session_start();
            $id = $student['id'];
            $_SESSION['role'] = "student";
            $_SESSION['s_id'] = $id;
            header("Location:Student_Home.html");

            exit;
        }

        // Prepare a query to check the email and password against the teachers table
        $stmt = $this->conn->prepare('SELECT * FROM faculty WHERE femail = ? AND fpassword = ?');
        $stmt->bind_param('ss', $this->email, $this->password);
        
        $stmt->execute();
        $teacher = $stmt->fetch();

        if($teacher) {
            // If the email and password match a teacher account, redirect to the teacher dashboard
            $id = $teacher['id'];
            $_SESSION['role'] = "faculty";
            $_SESSION['t_id'] = $id;
            header('Location: Faculty_Home.html');
            exit;
        }

        // Prepare a query to check the email and password against the admins table
        $stmt = $this->conn->prepare('SELECT * FROM admin WHERE aemail = ? AND apassword = ?');
        $stmt->bind_param('ss', $this->email,$this->password);
       // $stmt->bindParam(':apassword', $this->password);
        $stmt->execute();
        $admin = $stmt->fetch();

        if($admin) {
            // If the email and password match an admin account, redirect to the admin dashboard
            $id = $admin['id'];

            $_SESSION['a_id'] = $id;

            
            header('Location: Admin_home.html');
            exit;
        }

        // If the email and password do not match any account, redirect to the login page with an error message
        header('Location: login.html?error=1');
        exit;
    }
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $login = new Login($email, $password,$conn);
    $login->validate();
}

?>