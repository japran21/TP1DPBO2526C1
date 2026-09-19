#include <iostream>
#include <string>
#include <vector>
#include "Class.cpp"

using namespace std;

int main() {
    vector<Film> listFilm;
    int pilihan = 0;

    // Data Awal (Dummy Data)
    listFilm.push_back(Film("F01", "Inception", "Sci-Fi", "Christopher Nolan", 148, 50000));
    listFilm.push_back(Film("F02", "Interstellar", "Sci-Fi", "Christopher Nolan", 169, 55000));

    do {
        cout << "\n================================" << endl;
        cout << "       DATA FILM BIOSKOP        " << endl;
        cout << "================================" << endl;
        cout << "1. Tampilkan Semua Film" << endl;
        cout << "2. Tambah Film Baru" << endl;
        cout << "3. Ubah Data Film" << endl;
        cout << "4. Hapus Film" << endl;
        cout << "5. Keluar" << endl;
        cout << "Pilihan menu (1-5): ";
        if (!(cin >> pilihan)) {
            break;
        }

        if (pilihan == 1) {
            cout << "\n--- DAFTAR FILM BIOSKOP ---" << endl;
            if (listFilm.empty()) {
                cout << "Belum ada data film." << endl;
            } else {
                for (size_t i = 0; i < listFilm.size(); i++) {
                    cout << "[" << (i + 1) << "] ";
                    listFilm[i].tampilkanFilm();
                }
            }
        } 
        else if (pilihan == 2) {
            string id, judul, genre, sutradara;
            int durasi, harga;

            cout << "\n--- TAMBAH FILM BARU ---" << endl;
            cout << "Masukkan ID Film   : ";
            cin >> id;
            cin.ignore();
            cout << "Masukkan Judul     : ";
            getline(cin, judul);
            cout << "Masukkan Genre     : ";
            getline(cin, genre);
            cout << "Masukkan Sutradara : ";
            getline(cin, sutradara);
            cout << "Masukkan Durasi (m): ";
            cin >> durasi;
            cout << "Masukkan Harga (Rp): ";
            cin >> harga;

            listFilm.push_back(Film(id, judul, genre, sutradara, durasi, harga));
            cout << "\n-> Film berhasil ditambahkan!" << endl;
        } 
        else if (pilihan == 3) {
            string targetId;
            cout << "\n--- UBAH DATA FILM ---" << endl;
            cout << "Masukkan ID Film yang ingin diubah: ";
            cin >> targetId;

            bool found = false;
            for (size_t i = 0; i < listFilm.size(); i++) {
                if (listFilm[i].getId() == targetId) {
                    string judul, genre, sutradara;
                    int durasi, harga;

                    cin.ignore();
                    cout << "Masukkan Judul Baru     : ";
                    getline(cin, judul);
                    cout << "Masukkan Genre Baru     : ";
                    getline(cin, genre);
                    cout << "Masukkan Sutradara Baru : ";
                    getline(cin, sutradara);
                    cout << "Masukkan Durasi Baru (m): ";
                    cin >> durasi;
                    cout << "Masukkan Harga Baru (Rp): ";
                    cin >> harga;

                    listFilm[i].setJudul(judul);
                    listFilm[i].setGenre(genre);
                    listFilm[i].setSutradara(sutradara);
                    listFilm[i].setDurasi(durasi);
                    listFilm[i].setHarga(harga);

                    found = true;
                    cout << "\n-> Data film berhasil diperbarui!" << endl;
                    break;
                }
            }
            if (!found) {
                cout << "\n-> ID Film tidak ditemukan!" << endl;
            }
        } 
        else if (pilihan == 4) {
            string targetId;
            cout << "\n--- HAPUS FILM ---" << endl;
            cout << "Masukkan ID Film yang ingin dihapus: ";
            cin >> targetId;

            bool found = false;
            for (auto it = listFilm.begin(); it != listFilm.end(); ++it) {
                if (it->getId() == targetId) {
                    listFilm.erase(it);
                    found = true;
                    cout << "\n-> Film berhasil dihapus!" << endl;
                    break;
                }
            }
            if (!found) {
                cout << "\n-> ID Film tidak ditemukan!" << endl;
            }
        }
    } while (pilihan != 5);

    cout << "\nTerima kasih telah menggunakan sistem Data Film Bioskop!" << endl;
    return 0;
}