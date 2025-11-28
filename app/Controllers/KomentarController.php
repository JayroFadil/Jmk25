<?php

namespace Jmk25\Controllers;

use Jmk25\Models\KomentarModel;

class KomentarController
{
    public function store()
    {
        $uploadId = $_POST['upload_id'];
        $userId   = $_SESSION['user_id'];
        $text     = trim($_POST['komentar_text']);
        $parentId = $_POST['parent_id'] ?? null;

        if ($text === "") {
            die("Komentar tidak boleh kosong!");
        }

        KomentarModel::add($uploadId, $userId, $text, $parentId);

        header("Location: /post?id=" . $uploadId);
        exit;
    }
}