<?php

namespace Jmk25\Models;

use Jmk25\Config\Database;

class KomentarModel
{
    public static function conn()
    {
        return Database::getConnectionDB();
    }

    public static function getByUpload($uploadId)
    {
        $statement = self::conn()->prepare("
            SELECT k.*, u.username, u.user_pict
            FROM tbl_komentar k
            JOIN tbl_user u ON k.comment_user_id = u.id
            WHERE k.comment_upload_id = ?
            ORDER BY k.comment_created_at ASC
        ");
        $statement->execute([$uploadId]);

        return $statement->fetchAll();
    }

    // Menambah komentar atau reply
    public static function add($uploadId, $userId, $text, $parentId = null)
    {
        $statement = self::conn()->prepare("
            INSERT INTO tbl_komentar 
            (comment_upload_id, comment_user_id, komentar_text, comment_parent_id, comment_created_at)
            VALUES (?, ?, ?, ?, NOW())
        ");

        return $statement->execute([
            $uploadId,
            $userId,
            $text,
            $parentId
        ]);
    }
}
