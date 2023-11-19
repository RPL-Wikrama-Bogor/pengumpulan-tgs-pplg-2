const elmGetBooks = document.getElementById("getBooks")

async function getBooks() {
    const api = await fetch(`${url}/book`)
    const { data } = await api.json()

    data.forEach(data => {
        const newElement = document.createElement("div")
        newElement.innerHTML = `id: ${data.id},
                                Nama buku : ${data.name},
                                Penerbit : ${data.publisher},
                                Tahun terbit : ${data.year},
                                Jumlah halaman : ${data.halaman}`
        elmGetBooks.appendChild(newElement)

    });
}
getBooks()