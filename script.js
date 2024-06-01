document.getElementById('submitButton').addEventListener('click', function(event) {
    event.preventDefault(); // Menghentikan pengiriman form secara default
    
    var form = document.getElementById('registrationForm');
    var inputs = form.querySelectorAll('input[required]');
    var allFilled = true;

    inputs.forEach(function(input) {
        if (!input.value.trim()) {
            allFilled = false;
        }
    });

    if (allFilled) {
        // Mengirimkan form hanya jika semua field telah diisi
        // Anda dapat menambahkan validasi lain di sini sesuai kebutuhan
        
        // Membuat objek FormData untuk mengirim data form
        var formData = new FormData(form);

        // Mengirimkan data form menggunakan AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "register.php", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // Pendaftaran berhasil
                    window.location.href = "login.html"; // Mengarahkan ke halaman login
                } else {
                    // Terjadi kesalahan
                    alert('Terjadi kesalahan: ' + xhr.responseText);
                }
            }
        };
        xhr.send(formData);
    } else {
        alert('Ada bagian kosong yang belum diisi');
    }
});
