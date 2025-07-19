document.getElementById('get-otp').addEventListener('click', function () {
    const email = document.getElementById('email').value;
    if (!email) {
        alert('Enter Email!');
        return;
    }
    const url = window.BASE_URL;;
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
