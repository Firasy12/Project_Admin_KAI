import Swal from "sweetalert2";

export async function confirmAction(title, text) {
    return await Swal.fire({
        title,
        text,
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#00529B",
        cancelButtonColor: "#6c757d",
        confirmButtonText: "Ya",
        cancelButtonText: "Batal",
    });
}

export async function success(message) {
    return await Swal.fire({
        icon: "success",
        title: "Berhasil",
        text: message,
        confirmButtonColor: "#00529B",
    });
}

export async function error(message) {
    return await Swal.fire({
        icon: "error",
        title: "Terjadi Kesalahan",
        text: message,
        confirmButtonColor: "#d33",
    });
}

export async function inputRevision() {
    const result = await Swal.fire({
        title: "Catatan Revisi",
        input: "textarea",
        inputPlaceholder: "Masukkan catatan revisi...",
        inputAttributes: {
            rows: 5,
        },
        showCancelButton: true,
        confirmButtonText: "Lanjut",
        cancelButtonText: "Batal",
        confirmButtonColor: "#00529B",
        inputValidator: (value) => {
            if (!value) {
                return "Catatan revisi wajib diisi";
            }
        },
    });

    return result;
}
