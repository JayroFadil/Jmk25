<?php

use Jmk25\Models\KomentarModel;

$komentar = KomentarModel::getByUpload($id);

return View::render('pages/post/detail', [
    'upload' => $upload,
    'komentar' => $komentar
]);
