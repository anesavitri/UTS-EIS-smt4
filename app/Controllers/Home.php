<?php

namespace App\Controllers;

use App\Models\KomenModel;
use App\Models\PostModel;

class Home extends BaseController
{
    public function index()
    {
        return view('vw_home');
    }

    public function process()
    {
        if (!$this->validate([
            'konten' => [
                'rules' => 'required|max_length[500]',
                'errors' => [
                    'required' => '{field} Harus diisi',
                    'max_length' => '{field} Maksimal 500 Karakter',
                ],
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $postingan = new PostModel();
        $postingan->insert([
            'name' => $this->request->getVar('nama'),
            'content' => $this->request->getVar('konten')
        ]);
        return redirect()->to('/');
    }

    public function process2()
    {
        if (!$this->validate([
            'komen' => [
                'rules' => 'max_length[500]',
                'errors' => [
                    'max_length' => '{field} Maksimal 500 Karakter',
                ],
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        }
        $komen = new KomenModel();
        $komen->insert([
            'postId' => $this->request->getVar('postId'),
            'name' => $this->request->getVar('nama'),
            'komen' => $this->request->getVar('komentar')
        ]);
        return redirect()->to('/');
    }
}
