<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Produk extends ResourceController
{
    protected $modelName = 'App\Models\ProdukModel';
    protected $format    = 'json';
    public function index()
    {

        return $this->respond([
            'status' => true,
            'data' => $this->model->findAll()
        ], 200);
    }


    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        return $this->respond([
            'status' => true,
            'data' => $this->model->find($id)
        ]);
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */


    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $data = [
            'nama_produk' => $this->request->getVar('nama_produk'),
            'kategori' => $this->request->getVar('kategori'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'url' => $this->request->getVar('url'),
            'image' => $this->request->getVar('image'),
            'harga' => $this->request->getVar('harga'),
            'like' => $this->request->getVar('like'),
        ];
        if ($this->model->save($data)) {
            return $this->respond(['status' => true, 'message' => 'data produk berhasil di simpan'], 200);
        } else {
            return $this->respond(['status' => false, 'errors' => $this->model->errors()], 422);
        }
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */


    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        $data = [
            'nama_produk' => $this->request->getVar('nama_produk'),
            'kategori' => $this->request->getVar('kategori'),
            'deskripsi' => $this->request->getVar('deskripsi'),
            'url' => $this->request->getVar('url'),
            'image' => $this->request->getVar('image'),
            'harga' => $this->request->getVar('harga'),
            'like' => $this->request->getVar('like'),
        ];
        if ($this->model->update($id, $data)) {
            return $this->respond(['status' => true, 'message' => 'data produk berhasil di Update'], 200);
        } else {
            return $this->respond(['status' => false, 'errors' => $this->model->errors()], 422);
        }
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        $this->model->delete($id);
        return $this->respond(['status' => true, 'message' => 'Data Pasien Berhasil dihapus'], 200);
    }
}
