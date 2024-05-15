<?php
class Database {
    private $host = 'localhost';
    private $user = 'root';
    private $password = '';
    private $database = 'AiubVault';
    private $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function prepareStatement($sql) {
        return $this->conn->prepare($sql);
    }

    public function bindParams($stmt, $params) {
        $types = '';
        $bindParams = [];
        foreach ($params as $param) {
            if (is_int($param)) {
                $types .= 'i'; // integer
            } elseif (is_float($param)) {
                $types .= 'd'; // double
            } elseif (is_string($param)) {
                $types .= 's'; // string
            } else {
                $types .= 'b'; // blob
            }
            $bindParams[] = &$param;
        }
        array_unshift($bindParams, $types);
        call_user_func_array(array($stmt, 'bind_param'), $bindParams);
    }

    public function executeStatement($stmt) {
        return $stmt->execute();
    }

    public function getResult($stmt) {
        return $stmt->get_result();
    }
}

function withdrawAmount($amount) {
    $db = new Database();
    $stmt = $db->prepareStatement("UPDATE accounts SET balance = balance - ? WHERE id = 1");
    $db->bindParams($stmt, array($amount));
    return $db->executeStatement($stmt);
}

function depositAmount($amount) {
    $db = new Database();
    $stmt = $db->prepareStatement("UPDATE accounts SET balance = balance + ? WHERE id = 1");
    $db->bindParams($stmt, array($amount));
    return $db->executeStatement($stmt);
}
?>
