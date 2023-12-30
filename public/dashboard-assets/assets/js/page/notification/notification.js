function errorNotification() {
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener("mouseenter", Swal.stopTimer);
            toast.addEventListener("mouseleave", Swal.resumeTimer);
        },
    });

    Toast.fire({
        icon: "error",
        title: "Error",
    });
}

function loading() {
    Swal.fire({
        title: "Loading",
        didOpen: () => {
            Swal.showLoading();
        },
    });
}
