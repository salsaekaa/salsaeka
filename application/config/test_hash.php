<?php
$input = 'admin123';
$hash = '$2y$10$yk7kr9OKC3pTQLuVG/dhsudx9pLxSCA/8zHjBBiEtV0AacO3bwW.W';

if (password_verify($input, $hash)) {
    echo "✅ Cocok!";
} else {
    echo "❌ Tidak cocok!";
}
?>
