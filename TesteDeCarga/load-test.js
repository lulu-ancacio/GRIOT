import http from 'k6/http';
import { check, sleep } from 'k6';

export const options = {
    stages: [
        // Aquecimento
        { duration: '30s', target: 25 },

        // Aumenta para 50 usuários
        { duration: '30s', target: 50 },

        // Aumenta para 75 usuários
        { duration: '30s', target: 75 },

        // Atinge o requisito de 100 usuários
        { duration: '30s', target: 100 },

        // Mantém 100 usuários concorrentes
        { duration: '2m', target: 100 },

        // Redução da carga
        { duration: '30s', target: 0 },
    ],

    thresholds: {
        // Pelo menos 95% das requisições devem
        // terminar abaixo de 5 segundos
        http_req_duration: ['p(95)<5000'],

        // Menos de 5% de erros HTTP
        http_req_failed: ['rate<0.05'],
    },
};

const BASE_URL = 'https://griot.gt.tc';

export default function () {

    // Página principal
    const resposta = http.get(`${BASE_URL}/index.php`);

    check(resposta, {
        'status HTTP é 200': (r) => r.status === 200,
        'página não está vazia': (r) => r.body && r.body.length > 0,
    });

    // Pequeno intervalo entre as ações do usuário
    sleep(1);
}

 
