<?php

class Film
{
	private string $id;
	private string $judul;
	private string $genre;
	private string $sutradara;
	private int $durasi;
	private int $harga;

	public function __construct(
		string $id = '',
		string $judul = '',
		string $genre = '',
		string $sutradara = '',
		int $durasi = 0,
		int $harga = 0
	) {
		$this->id = $id;
		$this->judul = $judul;
		$this->genre = $genre;
		$this->sutradara = $sutradara;
		$this->durasi = $durasi;
		$this->harga = $harga;
	}

	public function setId(string $id): void
	{
		$this->id = $id;
	}

	public function getId(): string
	{
		return $this->id;
	}

	public function setJudul(string $judul): void
	{
		$this->judul = $judul;
	}

	public function getJudul(): string
	{
		return $this->judul;
	}

	public function setGenre(string $genre): void
	{
		$this->genre = $genre;
	}

	public function getGenre(): string
	{
		return $this->genre;
	}

	public function setSutradara(string $sutradara): void
	{
		$this->sutradara = $sutradara;
	}

	public function getSutradara(): string
	{
		return $this->sutradara;
	}

	public function setDurasi(int $durasi): void
	{
		$this->durasi = $durasi;
	}

	public function getDurasi(): int
	{
		return $this->durasi;
	}

	public function setHarga(int $harga): void
	{
		$this->harga = $harga;
	}

	public function getHarga(): int
	{
		return $this->harga;
	}

	public function tampilkanFilm(): void
	{
		$barisBaru = PHP_SAPI === 'cli' ? PHP_EOL : '<br>';

		echo "ID Film   : {$this->id}{$barisBaru}";
		echo "Judul     : {$this->judul}{$barisBaru}";
		echo "Genre     : {$this->genre}{$barisBaru}";
		echo "Sutradara : {$this->sutradara}{$barisBaru}";
		echo "Durasi    : {$this->durasi} menit{$barisBaru}";
		echo "Harga     : Rp {$this->harga}{$barisBaru}";
		echo "--------------------------------{$barisBaru}";
	}
}