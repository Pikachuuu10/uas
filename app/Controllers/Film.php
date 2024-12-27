<?php

namespace App\Controllers;

use App\Models\FilmModel;

class Film extends BaseController
{
    protected $filmModel;
    public function __construct()
    {
        $this->filmModel = new FilmModel();
    }

    public function index()
    {
        $film = $this->filmModel->findAll();

        $data = [
            'title' => 'Daftar Film',
            'film' => $this->filmModel->getFilm(),
        ];
        $this->filmModel = new FilmModel();
        return view('film/index', $data);
    }

    public function detail($id)
    {
        $data = [
            'title' => 'Detail Film',
            'film' => $this->filmModel->getFilm($id)
        ];

        if(empty($data['film'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul Film' . $id . 'tidak ditemukan.');
        }

        return view('film/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Film',
            'validation' => \Config\Services::validation() 
        ];

        return view('film/create', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'judul' => 'required|is_unique[film.judul]'
        ])) {
            $validation = \Config\Services::validation(); 

            return redirect()->to('/film/create')->withInput()->with('validation', $validation);
        }

        // ambil gambar
        $fileposter = $this->request->getFile('poster');

        // memindahkan path
        $fileposter->move('img');

        // mengganti nama poster
        $namaPoster = $fileposter->getName();


        $id = url_title($this->request->getVar('judul'), '-', true);
        $this->filmModel->save([
            'judul' => $this->request->getVar('judul'),
            'director' => $this->request->getVar('director'),
            'poster' => $namaPoster,
            'production' => $this->request->getVar('production'),
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/film');
    }

    public function delete($id)
    {

        $film = $this->filmModel->find($id);

        unlink('img/'. $film['poster']);

        $this->filmModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/film');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Form edit Data Film',
            'validation' => \Config\Services::validation(),
            'film' => $this-> filmModel->getFilm($id),
        ];

        return view('film/edit', $data);
    }

    public function update($id)
    {

        $filePoster = $this->request->getFile('poster');

        // cek gambar
        if($filePoster->getError() == 4) {
            $namaPoster = $this->request->getVar('posterLama');
        } else {
            $namaPoster = $filePoster->getRandomName();
            $filePoster->move('img/', $namaPoster);
            unlink('img' . $this->request->getVar('posterLama'));
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->filmModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'director' => $this->request->getVar('director'),
            'poster' => $namaPoster,
            'production' => $this->request->getVar('production'),
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/film');

    }
}
