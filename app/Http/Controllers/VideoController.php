<?php

namespace App\Http\Controllers;

class VideoController extends Controller
{
    public function store()
    {
        return 'cadastrar';
    }

    public function index()
    {
        return 'listar';
    }

    public function show(int $id)
    {
        return 'buscar';
    }

    public function update(int $id)
    {
        return 'atualizar';
    }

    public function destroy(int $id)
    {
        return 'apagar';
    }
}
