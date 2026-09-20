import java.util.ArrayList;
import java.util.Scanner;

public class Main {
    public static void main(String[] args) {
        ArrayList<Film> listFilm = new ArrayList<>();
        Scanner scanner = new Scanner(System.in);
        int pilihan = 0;

 
        listFilm.add(new Film("F01", "Inception", "Sci-Fi", "Christopher Nolan", 148, 50000));
        listFilm.add(new Film("F02", "Interstellar", "Sci-Fi", "Christopher Nolan", 169, 55000));

        do {
            System.out.println("\n================================");
            System.out.println("       DATA FILM BIOSKOP        ");
            System.out.println("================================");
            System.out.println("1. Tampilkan Semua Film");
            System.out.println("2. Tambah Film Baru");
            System.out.println("3. Ubah Data Film");
            System.out.println("4. Hapus Film");
            System.out.println("5. Cari Film");
            System.out.println("6. Keluar");
            System.out.print("Pilih: ");

            try {
                pilihan = Integer.parseInt(scanner.nextLine());
            } catch (Exception e) {
                break;
            }

            if (pilihan == 1) {
                System.out.println("\n--- DAFTAR FILM BIOSKOP ---");
                if (listFilm.isEmpty()) {
                    System.out.println("Belum ada data film.");
                } else {
                    for (int i = 0; i < listFilm.size(); i++) {
                        System.out.print("[" + (i + 1) + "] ");
                        listFilm.get(i).tampilkanFilm();
                    }
                }
            } else if (pilihan == 2) {
                System.out.println("\n--- TAMBAH FILM BARU ---");
                System.out.print("Masukkan ID Film   : ");
                String id = scanner.nextLine();
                System.out.print("Masukkan Judul     : ");
                String judul = scanner.nextLine();
                System.out.print("Masukkan Genre     : ");
                String genre = scanner.nextLine();
                System.out.print("Masukkan Sutradara : ");
                String sutradara = scanner.nextLine();
                System.out.print("Masukkan Durasi (m): ");
                int durasi = Integer.parseInt(scanner.nextLine());
                System.out.print("Masukkan Harga (Rp): ");
                int harga = Integer.parseInt(scanner.nextLine());

                listFilm.add(new Film(id, judul, genre, sutradara, durasi, harga));
                System.out.println("\n-> Film berhasil ditambahkan!");
            } else if (pilihan == 3) {
                System.out.println("\n--- UBAH DATA FILM ---");
                System.out.print("Masukkan ID Film yang ingin diubah: ");
                String targetId = scanner.nextLine();

                boolean found = false;
                for (int i = 0; i < listFilm.size(); i++) {
                    if (listFilm.get(i).getId().equalsIgnoreCase(targetId)) {
                        System.out.print("Masukkan Judul Baru     : ");
                        String judul = scanner.nextLine();
                        System.out.print("Masukkan Genre Baru     : ");
                        String genre = scanner.nextLine();
                        System.out.print("Masukkan Sutradara Baru : ");
                        String sutradara = scanner.nextLine();
                        System.out.print("Masukkan Durasi Baru (m): ");
                        int durasi = Integer.parseInt(scanner.nextLine());
                        System.out.print("Masukkan Harga Baru (Rp): ");
                        int harga = Integer.parseInt(scanner.nextLine());

                        listFilm.get(i).setJudul(judul);
                        listFilm.get(i).setGenre(genre);
                        listFilm.get(i).setSutradara(sutradara);
                        listFilm.get(i).setDurasi(durasi);
                        listFilm.get(i).setHarga(harga);

                        found = true;
                        System.out.println("\n-> Data film berhasil diperbarui!");
                        break;
                    }
                }
                if (!found) {
                    System.out.println("\n-> ID Film tidak ditemukan!");
                }
            } else if (pilihan == 4) {
                System.out.println("\n--- HAPUS FILM ---");
                System.out.print("Masukkan ID Film yang ingin dihapus: ");
                String targetId = scanner.nextLine();

                boolean found = false;
                for (int i = 0; i < listFilm.size(); i++) {
                    if (listFilm.get(i).getId().equalsIgnoreCase(targetId)) {
                        listFilm.remove(i);
                        found = true;
                        System.out.println("\n-> Film berhasil dihapus!");
                        break;
                    }
                }
                if (!found) {
                    System.out.println("\n-> ID Film tidak ditemukan!");
                }
            } else if (pilihan == 5) {
                System.out.println("\n--- CARI FILM ---");
                System.out.print("Masukkan ID Film yang dicari: ");
                String targetId = scanner.nextLine();

                boolean found = false;
                for (Film film : listFilm) {
                    if (film.getId().equalsIgnoreCase(targetId)) {
                        System.out.println("\n-> Data Ditemukan:");
                        film.tampilkanFilm();
                        found = true;
                        break;
                    }
                }
                if (!found) {
                    System.out.println("\n-> ID Film tidak ditemukan!");
                }
            }
        } while (pilihan != 6);

        System.out.println("\nTerima kasih telah menggunakan sistem Data Film Bioskop!");
        scanner.close();
    }
}
