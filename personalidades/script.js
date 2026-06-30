let dados = [];

async function chamarApi() {
    const response = await fetch('api/Personalidades.php');
    dados = await response.json();
}

chamarApi();

function openSidebar(id) {

    const person = dados[id];
    if (!person) return;

    document.getElementById('sidebar-photo').src = person.url;
    document.getElementById('sidebar-photo').alt = person.nome;
    document.getElementById('sidebar-name').textContent = person.nome;

    document.getElementById('sidebar-content').innerHTML = `
            <div class="info-item">
                <strong>Profissão</strong>
                <p>${person.prof}</p>
            </div>
            <div class="info-item">
                <strong>Biografia</strong>
                <p>${person.bio}</p>
            </div>

        `;

    document.getElementById('sidebar').classList.add('active');
    document.querySelector('.overlay').classList.add('active');
    document.body.style.overflow = 'hidden';   
}

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
