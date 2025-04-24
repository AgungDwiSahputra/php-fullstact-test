<?php
    require_once 'db.php';

    class ClientModel {
        private $pdo;

        public function __construct(PDO $pdo) {
            $this->pdo = $pdo;
        }

        // Mendapatkan semua data client
        public function getAll() {
            $stmt = $this->pdo->prepare('SELECT * FROM my_client WHERE deleted_at IS NULL');
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        // Mendapatkan data client bedasarkan ID
        public function getById($id) {
            $stmt = $this->pdo->prepare('SELECT * FROM my_client WHERE id = :id AND deleted_at IS NULL');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        // Menyimpan data client baru
        public function create($data) {
            $stmt = $this->pdo->prepare('INSERT INTO my_client (name, slug, is_project, self_capture, client_prefix, client_logo, address, phone_number, city) VALUES (:name, :slug, :is_project, :self_capture, :client_prefix, :client_logo, :address, :phone_number, :city)');
            $stmt->bindParam(':name', $data['name']);
            $stmt->bindParam(':slug', $data['slug']);
            $stmt->bindParam(':is_project', $data['is_project']);
            $stmt->bindParam(':self_capture', $data['self_capture']);
            $stmt->bindParam(':client_prefix', $data['client_prefix']);
            $stmt->bindParam(':client_logo', $data['client_logo']);
            $stmt->bindParam(':address', $data['address']);
            $stmt->bindParam(':phone_number', $data['phone_number']);
            $stmt->bindParam(':city', $data['city']);
            return $stmt->execute();
        }

        // Mengupdate Data Client
        public function update($id, $data) {
            $stmt = $this->pdo->prepare('UPDATE my_client SET name = :name, slug = :slug, is_project = :is_project, self_capture = :self_capture, client_prefix = :client_prefix, client_logo = :client_logo, address = :address, phone_number = :phone_number, city = :city WHERE id = :id AND deleted_at IS NULL');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':name', $data['name']);
            $stmt->bindParam(':slug', $data['slug']);
            $stmt->bindParam(':is_project', $data['is_project']);
            $stmt->bindParam(':self_capture', $data['self_capture']);
            $stmt->bindParam(':client_prefix', $data['client_prefix']);
            $stmt->bindParam(':client_logo', $data['client_logo']);
            $stmt->bindParam(':address', $data['address']);
            $stmt->bindParam(':phone_number', $data['phone_number']);
            $stmt->bindParam(':city', $data['city']);
            return $stmt->execute();
        }

        // Menghapus data client (soft delete)
        public function delete($id) {
            $stmt = $this->pdo->prepare('UPDATE my_client SET deleted_at = NOW() WHERE id = :id AND deleted_at IS NULL');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute();
        }
    }
?>