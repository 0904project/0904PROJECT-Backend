<?php

namespace App\Controllers;

use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use App\Models\KomenModel;


class Komen extends ResourceController
{
    use ResponseTrait;

    public function __construct()
    {
        $this->model = new KomenModel();
    }

    // GET /komen
    public function index()
    {
        $comments = $this->model->findAll();
        return $this->respond($comments);
    }

    // GET /komen/{id}
    public function show($id = null)
    {
        $comment = $this->model->find($id);
        if ($comment) {
            return $this->respond($comment);
        } else {
            return $this->failNotFound('Komentar tidak ditemukan');
        }
    }

    // POST /komen
    public function create()
    {
        $data = $this->request->getPost();
        if ($this->model->insert($data)) {
            return $this->respondCreated($data);
        } else {
            return $this->fail($this->model->errors());
        }
    }

    // PUT /komen/{id}
    public function update($id = null)
    {
        $data = $this->request->getRawInput();
        if ($this->model->update($id, $data)) {
            return $this->respond($data);
        } else {
            return $this->fail($this->model->errors());
        }
    }

    // DELETE /komen/{id}
    public function delete($id = null)
    {
        $comment = $this->model->find($id);
        if ($comment) {
            $this->model->delete($id);
            return $this->respondDeleted($comment);
        } else {
            return $this->failNotFound('Komen Tidak Ditemukan');
        }
    }
}
