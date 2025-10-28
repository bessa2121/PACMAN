import './bootstrap';

const successMsg = document.getElementById('success-msg');

successMsg.addEventListener('click', () => {
    successMsg.className.toggle('hidden')
})
