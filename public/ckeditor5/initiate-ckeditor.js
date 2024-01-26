ClassicEditor.create(document.querySelector(".editor"), {
    ckfinder: {
        method: "POST",
        dataType: "JSON",
        uploadUrl: "http://127.0.0.1:8000/save-image",
    },
    height: 1000, // Ganti nilai ini sesuai dengan tinggi yang Anda inginkan
}).catch((error) => {
    console.error(error);
});
