#include <iostream>
#include <string>

using namespace std;

class Film {
private:
    string id;
    string judul;
    string genre;
    string sutradara;
    int durasi; // menit
    int harga;  // rupiah

public:
    // Constructor default
    Film() {
        this->id = "";
        this->judul = "";
        this->genre = "";
        this->sutradara = "";
        this->durasi = 0;
        this->harga = 0;
    }

    // Constructor dengan parameter
    Film(string id, string judul, string genre, string sutradara, int durasi, int harga) {
        this->id = id;
        this->judul = judul;
        this->genre = genre;
        this->sutradara = sutradara;
        this->durasi = durasi;
        this->harga = harga;
    }

    // Getter & Setter
    void setId(string id) { this->id = id; }
    string getId() { return this->id; }

    void setJudul(string judul) { this->judul = judul; }
    string getJudul() { return this->judul; }

    void setGenre(string genre) { this->genre = genre; }
    string getGenre() { return this->genre; }

    void setSutradara(string sutradara) { this->sutradara = sutradara; }
    string getSutradara() { return this->sutradara; }

    void setDurasi(int durasi) { this->durasi = durasi; }
    int getDurasi() { return this->durasi; }

    void setHarga(int harga) { this->harga = harga; }
    int getHarga() { return this->harga; }

    // Method Tampilkan Data
    void tampilkanFilm() {
        cout << "ID Film   : " << id << endl;
        cout << "Judul     : " << judul << endl;
        cout << "Genre     : " << genre << endl;
        cout << "Sutradara : " << sutradara << endl;
        cout << "Durasi    : " << durasi << " menit" << endl;
        cout << "Harga     : Rp " << harga << endl;
        cout << "--------------------------------" << endl;
    }

    ~Film() {}
};
