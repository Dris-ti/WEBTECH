<?php 

class DbConnect{
    private $db_servername = "localhost";
    private $db_username = "root";
    private $db_password = "";
    private $db_name = "final_exam";
    private $conn;

    function text_validation($data)
    {
        $data = stripslashes($data);
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function executeData($query)
    {
        $this->conn = new mysqli($this->db_servername, $this->db_username, $this->db_password, $this->db_name);
        if($this->conn->connect_error)
        {
            die("Connection Error");
        }
        else
        {
            $res = $this->conn->query($query);
            $this->conn->close();
            
            if(!$res)
            {
                return false;
            }
            else
            {
                return true;
            }
        }
    }

    function getData($query)
    {
        $this->conn = new mysqli($this->db_servername, $this->db_username, $this->db_password, $this->db_name);

        if($this->conn->connect_error)
        {
            die("Connection Failed");
        }
        else
        {
            $rows = [];
            $res = $this->conn->query($query);
            $this->conn->close();

            if($res == false)
            {
                return false;
            }
            else
            {
                if($res->num_rows > 0)
                {
                    while($row = $res->fetch_assoc())
                    {
                        array_push($rows, $row);
                    }
                    return $rows;
                }
                else
                {
                    return false;
                }
            }
            
        }
    }

}

?>