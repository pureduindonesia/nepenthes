<?php

namespace App\Models;

class Departement extends Model
{
    public int $dept_no;
    public string $dept_name;

    public function save()
    {
        try {
            $stmt = $this->db->prepare("
            
            ");
            $stmt->bindParam(':dept_no', $this->dept_no);
            $status = $stmt->execute();


            $stmt = $this->db->query("SELECT LAST_INSERT_ID()");
            $last_id = $stmt->fetchColumn();


            $result = [
                'status' => $status,
                'id' => $last_id
            ];
        } catch (\PDOException $e) {
            http_response_code(500);
            $result = ["message" => $e->getMessage()];
        }
        return $result;
    }
}
