import http from 'k6/http';
import { sleep } from 'k6';

export const options = {
  vus: 20, 
  duration: '10s',
};

export default function loadTest () {
  http.get('https://griot.gt.tc/Fotografias.php');
  sleep(1);
}


// 20 usuários virtuais acessando a página de fotografias por 10 segundos, com um intervalo de 1 segundo entre cada acesso.
//Teste para verificar a capacidade do servidor em lidar com múltiplas requisições simultâneas e medir o tempo de resposta da página.
// k6 run testeDeCarga/load-test.js --summary-export=summary.json (comando para executar o teste e exportar um resumo dos resultados em formato JSON).
