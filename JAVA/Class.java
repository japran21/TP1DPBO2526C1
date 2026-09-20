class Film {
    private String id;
    private String judul;
    private String genre;
    private String sutradara;
    private int durasi; 
    private int harga; 

    public Film() {
        this.id = "";
        this.judul = "";
        this.genre = "";
        this.sutradara = "";
        this.durasi = 0;
        this.harga = 0;
    }

    public Film(String id, String judul, String genre, String sutradara, int durasi, int harga) {
        this.id = id;
        this.judul = judul;
        this.genre = genre;
        this.sutradara = sutradara;
        this.durasi = durasi;
        this.harga = harga;
    }

    public void setId(String id) { this.id = id; }
    public String getId() { return this.id; }

    public void setJudul(String judul) { this.judul = judul; }
    public String getJudul() { return this.judul; }

    public void setGenre(String genre) { this.genre = genre; }
    public String getGenre() { return this.genre; }

    public void setSutradara(String sutradara) { this.sutradara = sutradara; }
    public String getSutradara() { return this.sutradara; }

    public void setDurasi(int durasi) { this.durasi = durasi; }
    public int getDurasi() { return this.durasi; }

    public void setHarga(int harga) { this.harga = harga; }
    public int getHarga() { return this.harga; }

    public void tampilkanFilm() {
        System.out.println("ID Film   : " + id);
        System.out.println("Judul     : " + judul);
        System.out.println("Genre     : " + genre);
        System.out.println("Sutradara : " + sutradara);
        System.out.println("Durasi    : " + durasi + " menit");
        System.out.println("Harga     : Rp " + harga);
        System.out.println("--------------------------------");
    }
}
