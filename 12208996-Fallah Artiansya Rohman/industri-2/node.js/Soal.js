//Buatlah sebuah fungsi Javascript yang menggunakan filter untuk mengembalikan/menampilkan daftar buku dengan genre "fiction"
const books = [
    {
        title: "Harry Potter and the Sorcerer's Stone",
        author: "J.K. Rowling",
        genre: "Fantasy",
        year: 1997
    },
    {
        title: "To Kill a Mockingbird",
        author: "Harper Lee",
        genre: "fiction",
        year:1960
    },
    {
        title: "The Great Gatsby",
        author: "F. Scott Fitzgerald",
        genre: "fiction",
        year: 1925
    }
];

// Fungsi untuk mengembalikan daftar buku dengan genre "fiction"
function filterBukuFiction(buku) {
    return buku.genre === "fiction";
  }
  
  // Menggunakan metode filter untuk menyaring buku berdasarkan genre "fiction"
  const bukuFiction = daftarBuku.filter(filterBukuFiction);
  
  // Menampilkan daftar buku dengan genre "fiction"
  console.log(bukuFiction);