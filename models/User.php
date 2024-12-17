<?php
// models/User.php
class User {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

	public function IsAdmin(){
		return true;
	}

	public function isModerator(){
		return true;
	}

	public function getId() {
           return 1;
    }

	public function getUserGroup($userId) {
            return 1;
    }

    public function findUserByEmail($email) {
        $query = "SELECT * FROM users WHERE email = '" . $this->db->safe($email) . "'";
        $this->db->query($query);
        $this->db->safe($email);
        return $this->db->fetch();
    }

    public function createUser($email, $token) {
        $query = "INSERT INTO users (email, token) VALUES ('" . $this->db->safe($email) . "', '" . $this->db->safe($token) . "')";
        $this->db->query($query);
        $this->db->safe($email);
        $this->db->safe($token);
        return $this->db->affected();
    }

    public function confirmUser($token) {
        $query = "SELECT * FROM users WHERE token = '" . $this->db->safe($token) . "'";
        $this->db->query($query);
        $this->db->safe($token);
        $user = $this->db->fetch();

        if ($user) {
            $query = "UPDATE users SET confirmed = 1 WHERE token = '" . $this->db->safe($token) . "'";
            $this->db->query($query);
            $this->db->safe($token);
            return $this->db->affected();
        }

        return false;
    }

    public function verifyUser($login, $password) {
        $query = "SELECT * FROM users WHERE login = '" . $this->db->safe($login) . "'";
        $result = $this->db->query($query);
        $user = $this->db->fetch($result);

        if ($user && password_verify($password, $user['password'])) {
            return true;
        }

        return false;
    }

    public function getUserEmail($login) {
        $query = "SELECT email FROM users WHERE login = '" . $this->db->safe($login) . "'";
        $this->db->query($query);
        $this->db->safe($login);
        $user = $this->db->fetch();

        return $user['email'] ?? null;
    }

    public function registerUser($login, $password, $email) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO users (login, password, email) VALUES ('" . $this->db->safe($login) . "', '" . $this->db->safe($password) . "', '" . $this->db->safe($email) . "')";
        $this->db->query($query);
        $this->db->safe($login);
        $this->db->safe($hashedPassword);
        $this->db->safe($email);
        return $this->db->affected();
    }

    public function getUserByLogin($login) {
        $query = "SELECT * FROM users WHERE login = '" . $this->db->safe($login) . "'";
        $this->db->query($query);
        $this->db->safe($login);
        return $this->db->fetch();
    }

    public function getSmtpSettingsByCompanyId($companyId) {
        $query = "SELECT * FROM company_smtp WHERE company_id = '" . $this->db->safe($companyId) . "'";
        $this->db->query($query);
        $this->db->safe($companyId);
        return $this->db->fetch();
    }
}

?>