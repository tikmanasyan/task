<?php

    class Database {
        protected $db;
        public function connect() {
            $this->db = new mysqli("localhost","root", "", "task");
            return $this->db;
        }
        
    }