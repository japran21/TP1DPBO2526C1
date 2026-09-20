class Film:
    def __init__(self, id: str = "", judul: str = "", genre: str = "", sutradara: str = "", durasi: int = 0, harga: int = 0):
        self._id = str(id)
        self._judul = str(judul)
        self._genre = str(genre)
        self._sutradara = str(sutradara)
        self._durasi = int(durasi)
        self._harga = int(harga)

    def setId(self, id: str) -> None:
        self._id = id

    def getId(self) -> str:
        return self._id

    def setJudul(self, judul: str) -> None:
        self._judul = judul

    def getJudul(self) -> str:
        return self._judul

    def setGenre(self, genre: str) -> None:
        self._genre = genre

    def getGenre(self) -> str:
        return self._genre

    def setSutradara(self, sutradara: str) -> None:
        self._sutradara = sutradara

    def getSutradara(self) -> str:
        return self._sutradara

    def setDurasi(self, durasi: int) -> None:
        self._durasi = durasi

    def getDurasi(self) -> int:
        return self._durasi

    def setHarga(self, harga: int) -> None:
        self._harga = harga

    def getHarga(self) -> int:
        return self._harga

    def tampilkanFilm(self) -> None:
        print(f"ID Film   : {self._id}")
        print(f"Judul     : {self._judul}")
        print(f"Genre     : {self._genre}")
        print(f"Sutradara : {self._sutradara}")
        print(f"Durasi    : {self._durasi} menit")
        print(f"Harga     : Rp {self._harga}")
        print("--------------------------------")
