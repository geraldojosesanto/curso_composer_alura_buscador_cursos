<?php

require 'vendor/autoload.php';
#require 'src/Buscador.php';
#Teste::metodo();
#exit();

use Alura\BuscadorDeCursos\Buscador;
use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

/*
$client = new Client();
$resposta = $client->request('GET', 'https://www.alura.com.br/cursos-online-programacao/php',['base_uri'=> 'https://www.alura.com.br', 'verify' => false]);

$html = $resposta->getBody();

$crawler = new Crawler();
$crawler->addHtmlContent($html);

$cursos = $crawler->filter( 'span.card-curso__nome');
*/

$client = new Client(['base_uri'=>'https://www.alura.com.br/','verify' => false]);

$crawler = new Crawler();

$buscador = new Buscador( $client, $crawler);

$cursos = $buscador->buscar('/cursos-online-programacao/php');

foreach ($cursos as $curso) {
    #echo $curso .PHP_EOL;
    echo exibeMensagem($curso);
}