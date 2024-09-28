function showLoader() {
    document.getElementById('loader').classList.remove('d-none')
}
function hideLoader() {
    document.getElementById('loader').classList.add('d-none')
}

function successToast(msg) {
    const toastContent = document.createElement("div");
    toastContent.innerHTML = `<strong>Success !</strong> ${msg}`; // Bold message using <strong>
    toastContent.style.userSelect = "none"; // Disable text selection

    Toastify({
        gravity: "top",
        position: "center",
        node: toastContent, // Use the custom node instead of the text property
        className: "mb-5",
        style: {
            background: "linear-gradient(to bottom, #99ff99 0%, #009933 100%)",
        }
    }).showToast();
}

function errorToast(msg) {
    const toastContent = document.createElement("div");
    toastContent.innerHTML = `<strong>Error !</strong> ${msg}`; // Bold message using <strong>
    toastContent.style.userSelect = "none"; // Disable text selection

    Toastify({
        gravity: "top",
        position: "center",
        node: toastContent, // Use the custom node instead of the text property
        className: "mb-5",
        style: {
            background: "linear-gradient(to bottom, #ff3300 0%, #cc0066 100%)",
        }
    }).showToast();
}

