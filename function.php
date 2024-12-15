<?php
class Contact {
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $db="contact";
    public $mysqli;

    public function __construct() {
        $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
        if ($this->mysqli->connect_error) {
            die("Connection failed: " . $this->mysqli->connect_error);
        } else {
            echo "Connected to database successfully.";
        }
    }        
    

    public function contact($data) {
        $fullname = $data['fullname'];
        $email = $data['email'];
        $message = $data['message']; // sesuaikan dengan name dari form

        // Query insert
        $stmt = $this->mysqli->prepare("INSERT INTO contact (fullname, email, messages) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $fullname, $email, $message);
        
        if ($stmt->execute()) {
            echo "<script>alert('Query successfully submitted, Thank you!')</script>";
        } else {
            echo "<script>alert('Error: " . $this->mysqli->error . "')</script>";
        }
        
    }

}

if (isset($_POST['submit'])) {
    var_dump($_POST); // Debug input dari form
    include_once 'submit_form.php';
    $obj = new Contact();
    $res = $obj->contact($_POST);
    if ($res == true) {
        echo "<script>alert('Query successfully submitted, Thank you!')</script>";
    } else {
        echo "<script>alert('Error: " . $this->mysqli->error . "')</script>";
    }
}

?>
