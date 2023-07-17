<?php

require_once('model.php');

class Controller
{
    private $model;

    public function __construct()
    {

        return $this->model = new Model();
    }

    public function readData()
    {
        return $this->model->read();
    }

    public function insertData()
    {
        if (isset($_POST['addBtn'])) {
            $artistName = $_POST['artistName'];
            $songName = $_POST['songName'];
            $type = $_POST['type'];

            if ($this->model->insert($songName, $artistName, $type)) {
                return 'insert';
            };
        }
    }

    public function deleteData($id)
    {
        $this->model->delete($id);
        return 'delete';
    }
}
