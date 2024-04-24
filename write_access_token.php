<?php
// POSTリクエストからファイル内容を取得
$fileContent = $_POST['fileContent'];

// ファイルパス
$filePath = 'access_token.txt';

// ファイルを書き込みモードで開く（内容を上書き）
if (file_put_contents($filePath, $fileContent) !== false) {
    echo 'アクセストークンをファイルに書き込みました。';
} else {
    http_response_code(500); // サーバーエラー
    echo 'ファイルの書き込み中にエラーが発生しました。';
}
?>