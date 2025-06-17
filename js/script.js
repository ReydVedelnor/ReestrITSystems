document.getElementById('openModal').onclick = function() {
    document.getElementById('modal').style.display = 'block';
}

document.getElementById('closeModal').onclick = function() {
    document.getElementById('modal').style.display = 'none';
}

window.onclick = function(event) {
    if (event.target === document.getElementById('modal')) {
        document.getElementById('modal').style.display = 'none';
    }
}
