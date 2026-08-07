import http from 'k6/http';
import { sleep } from 'k6';

export const options = {
  vus: 1, 
  duration: '10s',
};

export default function loadTest () {
  http.get('https://griot.gt.tc/mensagemRecebida.php');
  sleep(1);
}


// k6 run testeDeCarga/load-test.js --summary-export=TesteDeCarga/Relatorios/MensagemRecebida48.json 