from Class import Film

def main():
    listFilm = []

    # Data Awal (Dummy Data)
    listFilm.append(Film("F01", "Inception", "Sci-Fi", "Christopher Nolan", 148, 50000))
    listFilm.append(Film("F02", "Interstellar", "Sci-Fi", "Christopher Nolan", 169, 55000))

    pilihan = 0
    while pilihan != 6:
        print("\n================================")
        print("       DATA FILM BIOSKOP        ")
        print("================================")
        print("1. Tampilkan Semua Film")
        print("2. Tambah Film Baru")
        print("3. Ubah Data Film")
        print("4. Hapus Film")
        print("5. Cari Film")
        print("6. Keluar")

        try:
            pilihan = int(input("Pilih: "))
        except ValueError:
            break

        if pilihan == 1:
            print("\n--- DAFTAR FILM BIOSKOP ---")
            if not listFilm:
                print("Belum ada data film.")
            else:
                for i, film in enumerate(listFilm):
                    print(f"[{i + 1}] ", end="")
                    film.tampilkanFilm()

        elif pilihan == 2:
            print("\n--- TAMBAH FILM BARU ---")
            id_film = input("Masukkan ID Film   : ")
            judul = input("Masukkan Judul     : ")
            genre = input("Masukkan Genre     : ")
            sutradara = input("Masukkan Sutradara : ")
            durasi = int(input("Masukkan Durasi (m): "))
            harga = int(input("Masukkan Harga (Rp): "))

            listFilm.append(Film(id_film, judul, genre, sutradara, durasi, harga))
            print("\n-> Film berhasil ditambahkan!")

        elif pilihan == 3:
            print("\n--- UBAH DATA FILM ---")
            targetId = input("Masukkan ID Film yang ingin diubah: ")

            found = False
            for film in listFilm:
                if film.getId().lower() == targetId.lower():
                    judul = input("Masukkan Judul Baru     : ")
                    genre = input("Masukkan Genre Baru     : ")
                    sutradara = input("Masukkan Sutradara Baru : ")
                    durasi = int(input("Masukkan Durasi Baru (m): "))
                    harga = int(input("Masukkan Harga Baru (Rp): "))

                    film.setJudul(judul)
                    film.setGenre(genre)
                    film.setSutradara(sutradara)
                    film.setDurasi(durasi)
                    film.setHarga(harga)

                    found = True
                    print("\n-> Data film berhasil diperbarui!")
                    break

            if not found:
                print("\n-> ID Film tidak ditemukan!")

        elif pilihan == 4:
            print("\n--- HAPUS FILM ---")
            targetId = input("Masukkan ID Film yang ingin dihapus: ")

            found = False
            for i in range(len(listFilm)):
                if listFilm[i].getId().lower() == targetId.lower():
                    listFilm.pop(i)
                    found = True
                    print("\n-> Film berhasil dihapus!")
                    break

            if not found:
                print("\n-> ID Film tidak ditemukan!")

        elif pilihan == 5:
            print("\n--- CARI FILM ---")
            targetId = input("Masukkan ID Film yang dicari: ")

            found = False
            for film in listFilm:
                if film.getId().lower() == targetId.lower():
                    print("\n-> Data Ditemukan:")
                    film.tampilkanFilm()
                    found = True
                    break

            if not found:
                print("\n-> ID Film tidak ditemukan!")

    print("\nTerima kasih telah menggunakan sistem Data Film Bioskop!")

if __name__ == "__main__":
    main()