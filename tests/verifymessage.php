<?php

function verifymessage($addr, $base64Sig, $message) {
    system(dirname(__FILE__).'/../verifymessage '.escapeshellarg($addr).' '.escapeshellarg($base64Sig).' '.escapeshellarg($message). ' >/dev/null 2>&1', $returnCode);
    return $returnCode;
}

echo "Testing valid/correct signature... ";
$returnCode = verifymessage('17u1mDkgNcdwi44braeTKpvnfNnTrgvBfB', 'IHfvfadyMsn/P0tKH6UnDnbYiZcOWWhk8xbGIWUOwTX75MR8LfEn9Mdxq5R2h1IRXKaFxbqR6SfC3sZrHBdA0Tg=', 'test signature');
if ($returnCode == 0) echo "pass.\n"; else echo "FAIL!\n";

echo "Testing valid/correct signature (uncompressed address)... ";
$returnCode = verifymessage('1HNPhhfsVTZ6Visozkzwi1NAk3yDQnmfgH', 'G7Q5ULHgIJhvORjhmF2wEFJloc3UzzCn4ypBPE+g9GOmz93t0WuLUzYSzAGpzN24qhK+uw4X1+7KtDH8WLLSdo8=', '');
if ($returnCode == 0) echo "pass.\n"; else echo "FAIL!\n";

echo "Testing modified message... ";
$returnCode = verifymessage('17u1mDkgNcdwi44braeTKpvnfNnTrgvBfB', 'IHfvfadyMsn/P0tKH6UnDnbYiZcOWWhk8xbGIWUOwTX75MR8LfEn9Mdxq5R2h1IRXKaFxbqR6SfC3sZrHBdA0Tg=', 'test evil attacker');
if ($returnCode == 1) echo "pass.\n"; else echo "FAIL!\n";

echo "Testing modified address... ";
$returnCode = verifymessage('17qnunSja9HUsb6yAg7XG3sQeEABLSBA2w', 'IHfvfadyMsn/P0tKH6UnDnbYiZcOWWhk8xbGIWUOwTX75MR8LfEn9Mdxq5R2h1IRXKaFxbqR6SfC3sZrHBdA0Tg=', 'test signature');
if ($returnCode == 1) echo "pass.\n"; else echo "FAIL!\n";
