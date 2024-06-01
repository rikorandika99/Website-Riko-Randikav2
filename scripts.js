document.getElementById('submitButton').addEventListener('click', function() {
    var form = document.getElementById('registrationForm');
    var formData = new FormData(form);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'login.php', true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            var response = JSON.parse(xhr.responseText);
            if (response.success) {
                alert('Berhasil login, silahkan menjelajah');
                window.location.href = 'welcome.php'; // Redirect to welcome page
            } else {
                alert('Maaf, username atau password salah');
            }
        } else {
            alert('Terjadi kesalahan, silakan coba lagi');
        }
    };

    xhr.send(formData);
});
