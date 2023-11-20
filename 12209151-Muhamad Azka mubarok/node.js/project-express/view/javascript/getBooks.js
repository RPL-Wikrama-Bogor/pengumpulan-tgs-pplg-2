const elmGetBooks = document.getElementById("getBooks")

        async function getBooks() {
            const api = await fetch(`${url}/book`)
            const { data } = await api.json()
            
            data.forEach(data => {
                const NewElement = document.createElement("div")
                NewElement.innerHTML = `id: ${data.id},
                                        Nama Buku: ${data.name},
                                        publisher: "${data.publisher},
                                        year="${data.year}.
                                        Page Count: ${data.page_count}`

                elmGetBooks.appendChild(NewElement)
            });

        }
        getBooks()