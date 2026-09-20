<?php

require_once __DIR__ . '/Class.php';
session_start();

if (!isset($_SESSION['listFilm'])) {
	$_SESSION['listFilm'] = [
		new Film('F01', 'Inception', 'Sci-Fi', 'Christopher Nolan', 148, 50000),
		new Film('F02', 'Interstellar', 'Sci-Fi', 'Christopher Nolan', 169, 55000),
	];
}

$listFilm = &$_SESSION['listFilm'];
$halaman = $_GET['halaman'] ?? 'daftar';
$pesan = '';
$jenisPesan = 'success';

function e(string $nilai): string
{
	return htmlspecialchars($nilai, ENT_QUOTES, 'UTF-8');
}

function cariFilm(array $listFilm, string $id): ?Film
{
	foreach ($listFilm as $film) {
		if ($film->getId() === $id) {
			return $film;
		}
	}

	return null;
}

function gambarFilm(Film $film): string
{
  $poster = [
    'F01' => 'GAMBAR/woody.jpeg',
    'F02' => 'GAMBAR/download.jpeg',
  ];

  return $poster[$film->getId()] ?? 'GAMBAR/download%20(19).jpeg';
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST') {
	$aksi = $_POST['aksi'] ?? '';

	if ($aksi === 'tambah') {
		$id = trim($_POST['id'] ?? '');
		if ($id === '' || cariFilm($listFilm, $id) !== null) {
			$pesan = 'ID film wajib diisi dan harus berbeda.';
			$jenisPesan = 'error';
			$halaman = 'tambah';
		} else {
			$listFilm[] = new Film($id, trim($_POST['judul'] ?? ''), trim($_POST['genre'] ?? ''), trim($_POST['sutradara'] ?? ''), (int) ($_POST['durasi'] ?? 0), (int) ($_POST['harga'] ?? 0));
			$pesan = 'Film berhasil ditambahkan.';
			$halaman = 'daftar';
		}
	} elseif ($aksi === 'ubah') {
		$film = cariFilm($listFilm, trim($_POST['id'] ?? ''));
		if ($film === null) {
			$pesan = 'Film tidak ditemukan.';
			$jenisPesan = 'error';
		} else {
			$film->setJudul(trim($_POST['judul'] ?? ''));
			$film->setGenre(trim($_POST['genre'] ?? ''));
			$film->setSutradara(trim($_POST['sutradara'] ?? ''));
			$film->setDurasi((int) ($_POST['durasi'] ?? 0));
			$film->setHarga((int) ($_POST['harga'] ?? 0));
			$pesan = 'Data film berhasil diperbarui.';
		}
		$halaman = 'daftar';
	} elseif ($aksi === 'hapus') {
		$id = trim($_POST['id'] ?? '');
		$jumlahSebelum = count($listFilm);
		$listFilm = array_values(array_filter($listFilm, static fn (Film $film): bool => $film->getId() !== $id));
		$_SESSION['listFilm'] = $listFilm;
		$berhasil = count($listFilm) < $jumlahSebelum;
		$pesan = $berhasil ? 'Film berhasil dihapus.' : 'Film tidak ditemukan.';
		$jenisPesan = $berhasil ? 'success' : 'error';
	}
}

$filmUntukDiubah = null;
if ($halaman === 'ubah') {
	$filmUntukDiubah = cariFilm($listFilm, trim($_GET['id'] ?? ''));
	if ($filmUntukDiubah === null) {
		$pesan = 'Film tidak ditemukan.';
		$jenisPesan = 'error';
		$halaman = 'daftar';
	}
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Film Bioskop</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <div class="container">
    <header>
      <h1>Data Film Bioskop</h1>
    </header>
    <nav><a href="?halaman=daftar">Daftar Film</a><a href="?halaman=tambah">Tambah Film</a></nav>
    <main class="content">
      <?php if ($pesan !== ''): ?><div class="alert <?= e($jenisPesan) ?>"><?= e($pesan) ?></div><?php endif; ?>
      <?php if ($halaman === 'tambah' || $halaman === 'ubah'): ?>
      <?php $isUbah = $halaman === 'ubah'; ?>
      <h2><?= $isUbah ? 'Ubah Data Film' : 'Tambah Film Baru' ?></h2>
      <form method="post" class="form-grid">
        <input type="hidden" name="aksi" value="<?= $isUbah ? 'ubah' : 'tambah' ?>">
        <label>ID Film<input name="id" value="<?= $isUbah ? e($filmUntukDiubah->getId()) : '' ?>"
            <?= $isUbah ? 'readonly' : 'required' ?>></label>
        <label>Judul<input name="judul" value="<?= $isUbah ? e($filmUntukDiubah->getJudul()) : '' ?>" required></label>
        <label>Genre<input name="genre" value="<?= $isUbah ? e($filmUntukDiubah->getGenre()) : '' ?>" required></label>
        <label>Sutradara<input name="sutradara" value="<?= $isUbah ? e($filmUntukDiubah->getSutradara()) : '' ?>"
            required></label>
        <label>Durasi (menit)<input type="number" name="durasi" min="0"
            value="<?= $isUbah ? $filmUntukDiubah->getDurasi() : '' ?>" required></label>
        <label>Harga (Rp)<input type="number" name="harga" min="0"
            value="<?= $isUbah ? $filmUntukDiubah->getHarga() : '' ?>" required></label>
        <div class="form-actions"><button class="primary" type="submit">Simpan</button><a class="secondary"
            href="?halaman=daftar">Batal</a></div>
      </form>
      <?php else: ?>
      <h2>Daftar Film Bioskop</h2>
      <?php if (count($listFilm) === 0): ?><p>Belum ada data film.</p><?php else: ?>
      <table>
        <thead>
          <tr>
            <th>No.</th>
            <th>ID</th>
            <th>Judul</th>
            <th>Genre</th>
            <th>Sutradara</th>
            <th>Durasi</th>
            <th>Harga</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($listFilm as $index => $film): ?><tr>
            <td><?= $index + 1 ?></td>
            <td><?= e($film->getId()) ?></td>
            <td class="film-title">
              <img src="<?= e(gambarFilm($film)) ?>" alt="Poster <?= e($film->getJudul()) ?>" loading="lazy">
              <span><?= e($film->getJudul()) ?></span>
            </td>
            <td><?= e($film->getGenre()) ?></td>
            <td><?= e($film->getSutradara()) ?></td>
            <td><?= $film->getDurasi() ?> menit</td>
            <td>Rp <?= number_format($film->getHarga(), 0, ',', '.') ?></td>
            <td class="actions"><a class="secondary"
                href="?halaman=ubah&amp;id=<?= urlencode($film->getId()) ?>">Ubah</a>
              <form method="post" onsubmit="return confirm('Hapus film ini?');"><input type="hidden" name="aksi"
                  value="hapus"><input type="hidden" name="id" value="<?= e($film->getId()) ?>"><button class="danger"
                  type="submit">Hapus</button></form>
            </td>
          </tr><?php endforeach; ?></tbody>
      </table>
      <?php endif; ?>
      <?php endif; ?>
    </main>
  </div>
</body>

</html>