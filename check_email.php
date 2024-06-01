document.getElementById('submitButton').addEventListener('click', function(event) {
    event.preventDefault(); // Mencegah pengiriman formulir secara default

    var form = document.getElementById('registrationForm');
    var inputs = form.querySelectorAll('input[required]');
    var allFilled = true;

    inputs.forEach(function(input) {
        if (!input.value.trim()) {
            allFilled = false;
        }
    });

    if (allFilled) {
        // Mengirimkan permintaan HTTP ke server untuk memeriksa email
        var email = document.getElementById('email').value;
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'check_email.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                if (xhr.responseText === 'registered') {
                    document.getElementById('error-message').innerText = 'Maaf, email sudah digunakan';
                } else {
                    form.submit(); // Kirim formulir jika email belum terdaftar
                }
            }
        };
        xhr.send('email=' + encodeURIComponent(email));
    } else {
        alert('Ada bagian kosong yang belum diisi');
    }
});
