<?php
class Database {
    public function __construct($config) {
        $this->config = $config;
    }

    public function connect() {
        $conn_str = str_replace("\n", "", "
            host={$this->config["host"]}
            port={$this->config["port"]}
            dbname={$this->config["database"]}
            user={$this->config["user"]}
            password={$this->config["password"]}");
        $this->db = pg_connect($conn_str);
    }

    public function close() {
        if ($this->db) {
            pg_close($this->db);
            $this->db = false;
        }
    }

    public function query($sql, $params = []) {
        $result = pg_query_params($this->db, $sql, $params);
        if (!$result) {
            return false;
        }
        $rows = [];
        while ($row = pg_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function get_last_error() {
        return pg_last_error($this->db);
    }
}
?>
