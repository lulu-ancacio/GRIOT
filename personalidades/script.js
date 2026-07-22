

function closeSidebar() {
    document.getElementById('sidebar').classList.remove('active');
    document.querySelector('.overlay').classList.remove('active');
    document.body.style.overflow = 'auto';
}

// Fechar com ESC
document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
        closeSidebar();
    }
});
