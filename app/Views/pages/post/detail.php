
<?php
function tampilkanKomentar($list, $parent = null, $level = 0) {
    foreach ($list as $k) {
        if ($k['comment_parent_id'] == $parent) {
            ?>
            <div style="margin-left: <?= $level * 30 ?>px; padding-left:10px; border-left:1px solid #ccc; margin-top:10px">

                <strong><?= $k['username'] ?></strong>
                <p><?= $k['komentar_text'] ?></p>
                <small><?= $k['comment_created_at'] ?></small>

                <!-- Tombol Balas -->
                <button onclick="document.getElementById('reply-<?= $k['id_komentar'] ?>').style.display='block'">
                    Balas
                </button>
                
                <!-- Form Reply -->
                <div id="reply-<?= $k['id_komentar'] ?>" style="display:none;">
                    <form action="/komentar/store" method="POST">
                        <input type="hidden" name="upload_id" value="<?= $k['comment_upload_id'] ?>">
                        <input type="hidden" name="parent_id" value="<?= $k['id_komentar'] ?>">
                        <textarea name="komentar_text" placeholder="Tulis balasan..." required></textarea>
                        <button type="submit">Kirim Balasan</button>
                    </form>
                </div>

            </div>
            <?php

// Panggil reply anak
            tampilkanKomentar($list, $k['id_komentar'], $level + 1);
        }
    }
}
?>

<form action="/komentar/store" method="POST">
    <input type="hidden" name="upload_id" value="<?= $upload['id_upload'] ?>">
    <textarea name="komentar_text" placeholder="Tulis komentar..." required></textarea>
    <button type="submit">Kirim</button>
</form>
<?php tampilkanKomentar($komentar); ?>