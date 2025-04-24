<?php
    require_once 'ClientModel.php';

    class ClientController {
        private $model;

        public function __construct($pdo) {
            $this->model = new ClientModel($pdo);
        }

        public function handleRequest($method, $id = null, $data = null) {
            header('Content-Type: application/json');
            switch ($method) {
                case 'GET':
                    if ($id) {
                        return json_encode($this->model->getById($id));
                    } else {
                        return json_encode($this->model->getAll());
                    }
                case 'POST':
                    return json_encode($this->model->create($data));
                case 'PUT':
                    return json_encode($this->model->update($id, $data));
                case 'DELETE':
                    return json_encode($this->model->delete($id));
                default:
                    http_response_code(405);
                    return json_encode(['message' => 'Method Not Allowed']);
            }
        }
    }
?>