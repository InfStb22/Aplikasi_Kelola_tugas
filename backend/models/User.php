<?php

namespace Backend\Models;

class User
{
    private $conn;
    private $table = 'users';

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getUserByNim($nim)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE user_nim = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s', $nim);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        return null;
    }

    public function getUserById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE user_id = ? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $id); // 'i' untuk tipe integer
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        }

        return null;
    }

    public function updatePassword($userId, $passwordNew)
    {
        $query = "UPDATE " . $this->table . " SET user_password = ? WHERE user_id = ?";
        $stmt = $this->conn->prepare($query);
        $hashed_password = password_hash($passwordNew, PASSWORD_DEFAULT); // Hash password baru
        $stmt->bind_param('si', $hashed_password, $userId); // 'si' untuk string dan integer
        return $stmt->execute(); // Return true jika update berhasil
    }
}
