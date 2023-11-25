function wait(ms) {
    return new Promise((resolve) => {
        setTimeout(resolve, ms);
    });
}

// fungsi asinkron dengan async/await
async function main() {
    console.log("Mulai...")
    // menunggu selama 2 detik
    await wait(2000);
    console.log("Setelah menunggu 2 detik")
}

main()
main()