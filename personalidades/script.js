
        const people = {
            1: {
                nome: "Djonga",
                photo: "https://i.pinimg.com/736x/2a/12/74/2a12748d5fe91b76480c5bf5cb2a8c13.jpg",
                funcao: "Cantor",
                bio: "Gustavo Pereira Marques, mais conhecido como Djonga, é um rapper, cantor e compositor brasileiro. Considerado um dos nomes mais influentes do rap na atualidade, o artista chama a atenção por suas letras diretas e agressivas, com fortes críticas sociais.",
            },
            2: {
                nome: "Carolina Maria de Jesus",
                photo: "https://i.pinimg.com/736x/a0/12/ed/a012eda8a95f46e037bb9d2d21ffc2d3.jpg",
                funcao: "Escritora",
                bio: "Carolina Maria de Jesus foi uma escritora e poetisa brasileira, conhecida por sua obra que retrata a vida no interior do Brasil. Sua narrativa é marcada pela simplicidade e profundidade emocional.",
              
            },
            3: {
                        nome: "Marielle Franco",
                        photo: "https://i.pinimg.com/736x/7f/e9/61/7fe961fb70c99cc41ff9b7107297ba82.jpg",
                        funcao: "Sociologa e Ativista",
                        bio: "Marielle Franco foi uma socióloga e ativista brasileira, conhecida por seu trabalho em defesa dos direitos humanos e contra o racismo. Ela foi vereadora do Rio de Janeiro e assassinada em 2018.",
                    
            },
            4: {
               nome: "Djonga",
                photo: "https://i.pinimg.com/736x/2a/12/74/2a12748d5fe91b76480c5bf5cb2a8c13.jpg",
                funcao: "Cantor",
                bio: "Gustavo Pereira Marques, mais conhecido como Djonga, é um rapper, cantor e compositor brasileiro. Considerado um dos nomes mais influentes do rap na atualidade, o artista chama a atenção por suas letras diretas e agressivas, com fortes críticas sociais.",
          
            },
            5: {
               nome: "Carolina Maria de Jesus",
                photo: "https://i.pinimg.com/736x/a0/12/ed/a012eda8a95f46e037bb9d2d21ffc2d3.jpg",
                funcao: "Escritora",
                bio: "Carolina Maria de Jesus foi uma escritora e poetisa brasileira, conhecida por sua obra que retrata a vida no interior do Brasil. Sua narrativa é marcada pela simplicidade e profundidade emocional.",
              
            },
            6: {
                nome: "Marielle Franco",
                photo: "https://i.pinimg.com/736x/7f/e9/61/7fe961fb70c99cc41ff9b7107297ba82.jpg",
                funcao: "Sociologa e Ativista",
                bio: "Marielle Franco foi uma socióloga e ativista brasileira, conhecida por seu trabalho em defesa dos direitos humanos e contra o racismo. Ela foi vereadora do Rio de Janeiro e assassinada em 2018.",
               
            }
        };

        function openSidebar(id) {
    const person = people[id];
    if (!person) return;

    document.getElementById('sidebar-photo').src = person.photo;
    document.getElementById('sidebar-photo').alt = person.nome;
    document.getElementById('sidebar-name').textContent = person.nome   ;
    
    document.getElementById('sidebar-content').innerHTML = `
        <div class="info-item">
            <strong>Profissão</strong>
            <p>${person.funcao}</p>
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
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        closeSidebar();
    }
});
 