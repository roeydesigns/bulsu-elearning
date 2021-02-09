<?php 

class Users {
    private $id;
    private $student_no;
    private $username;
    private $password;
    private $created_at;
    private $user_firstname;
    private $user_middlename;
    private $user_lastname;
    private $email;
    private $phone;
    private $address;
    private $city;
    private $province;
    private $gender;
    private $user_image;
    private $dbh;
    private $error;

    public function __construct() {
        $this->dbh = new PDO("mysql:dbname=ilearn;host=localhost;", 'root', '');
    }
    public function createNew($student_no, $username, $password, $user_firstname, $user_middlename, $user_lastname, $email, $phone, $address, $city, $province, $gender, $user_image ) {
        $this->setByParams( -1, $student_no, $username, $password, date("d.m.Y h:m"), $user_firstname, $user_middlename, $user_lastname, $email, $phone, $address, $city, $province, $gender, $user_image);
    }

    public function setByParams($id, $student_no, $username, $password, $created_at, $user_firstname, $user_middlename, $user_lastname, $email, $phone, $address, $city, $province, $gender, $user_image ) {
        if (strlen($username) == 0) {
            $this->id = -1;
        } else {
            $this->id = $id;
            $this->student_no = $student_no;
            $this->username = $username;
            $this->password = $password;
            $this->created_at = $created_at;
            $this->user_firstname = $user_firstname;
            $this->user_middlename = $user_middlename;
            $this->user_lastname = $user_lastname;
            $this->email = $email;
            $this->phone = $phone;
            $this->address = $address;
            $this->city = $city;
            $this->province = $province;
            $this->gender = $gender;
            $this->user_image = $user_image;

        }
    }

    public function setByRow( $row ) {
        //print_r($row);
        $this->setByParams (
            $row['id'],
            $row['student_no'],
            $row['username'],
            $row['password'],
            $row['created_at'],
            $row['user_firstname'],
            $row['user_middlename'],
            $row['user_lastname'],
            $row['email'],
            $row['phone'],
            $row['address'],
            $row['city'],
            $row['province'],
            $row['gender'],
            $row['user_image']

        );
    }

    public function SqlSelectEntryById( $id ) {
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = 'SELECT * FROM users WHERE id= :id;';

        $stmt = $this->dbh->prepare($query);
        $result = $stmt->execute(array(
            ':id' => $id
        ));

        $this->error = $this->dbh->errorInfo();
        //print_r($this->error);

        $entry = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->setByRow($entry);
        //print_r($entry);

        return $result;
    }

    /**
     * Get the value of id
     */ 
    public function getId(){
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 

    public function getStNo(){
        return $this->student_no;
    }

    public function getUsername(){
        return $this->username;
    }

    public function getFName(){
        return $this->user_firstname;
    }

    public function getMName(){
        return $this->user_middlename;
    }

    public function getLName(){
        return $this->user_lastname;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPhone(){
        return $this->phone;
    }

    public function getAddress(){
        return $this->address;
    }

    public function getCity(){
        return $this->city;
    }

    public function getProvince(){
        return $this->province;
    }

    public function getGender(){
        return $this->gender;
    }

    public function getUsrImg(){
        return $this->user_image;
    }

}


?>