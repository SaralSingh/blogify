document.getElementById('get-otp').addEventListener('click', function () {
    const email = document.getElementById('email').value;
    if (!email) {
        alert('Enter Email!');
        return;
    }
    // const url = "http://127.0.0.1:8000";
    const url = "https://full-drake-sound.ngrok-free.app";
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch(`${url}/otp`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken // if CSRF is enabled
        },
        body: JSON.stringify({ email: email })
    })
    .then(response => response.json())
    .then(info => {
        console.log(info);
    })
    .catch(error => {
        console.error('Error:', error);
    });
});
