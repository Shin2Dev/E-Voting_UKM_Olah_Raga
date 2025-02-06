document.addEventListener("DOMContentLoaded", function() {
    const loginForm = document.getElementById("loginForm");
    const loginSection = document.getElementById("loginSection");
    const mainSection = document.getElementById("mainSection");
    const logoutButton = document.getElementById("logout");

    // Simulasi data pengguna untuk login
    const validUser  = {
        nama_lengkap: "Maharani",
        nomor_induk: "123456"
    };

    loginForm.addEventListener("submit", function(event) {
        event.preventDefault();

        const namaLengkap = document.getElementById("nama_lengkap").value;
        const nomorInduk = document.getElementById("nomor_induk").value;

        // Cek kredensial
        if (namaLengkap === validUser .nama_lengkap && nomorInduk === validUser .nomor_induk) {
            loginSection.style.display = "none";
            mainSection.style.display = "block";
        } else {
            alert("Nama lengkap atau nomor induk salah. Silakan coba lagi.");
        }
    });

    logoutButton.addEventListener("click", function(event) {
        event.preventDefault(); 
        loginSection.style.display = "block"; 
        mainSection.style.display = "none"; 
        loginForm.reset(); 
    });
});