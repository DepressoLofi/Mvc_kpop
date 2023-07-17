<?php
class DBH
{
    protected $servername = "localhost";
    protected $username = "root";
    protected $password = "";
    protected $database = "kpop";
    protected $conn;

    public function __construct()
    {
        $this->connect();
    }

    private function connect()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);

        if ($this->conn->connect_error) {
            echo "connection fail.." . mysqli_connect_error();
        }
    }
}

class Model extends DBH
{
    public function read()
    {
        $sql = "SELECT * FROM song";
        $query = $this->conn->query($sql);
        return $query;
    }

    public function insert($songName, $artistName, $type)
    {
        $sql = "INSERT INTO song (song_name, artist_name, type) VALUES ('$songName', '$artistName', '$type')";

        if ($this->conn->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM song WHERE id = $id";
        return $this->conn->query($sql);
    }
}
