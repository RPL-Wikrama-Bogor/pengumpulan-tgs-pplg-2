const elmGetBooks = document.getElementById("getBooks")

        async function getBooks() {
            const api = await fetch(`${url}/book`)
            const { data } = await api.json()

            data.forEach(data => {

                const newElement = document.createElement("div")
                newElement.innerHTML = `Id: ${data.id},
                                        Nama Buku: ${data.name},
                                        publisher: ${data.publisher},
                                        year: ${data.year},
                                        page Count: ${data.page_count}`
                console.log(newElement)
                elmGetBooks.appendChild(newElement)

            });

        }

        getBooks()