<?php
include('header.php');                                                                      // << Coloca o Header na página puxando ele do arquivo header.php 

$data_nascimento = $_POST['data_nascimento'];                                               // criação da variavel data de nascimento
$signos = simplexml_load_file(__DIR__ . "/signos.xml");                           // criação da variavel signos


function verificar_signo($data_nascimento, $signos) {                           // criando função
    $dia_mes = date("d/m", strtotime($data_nascimento));

    foreach ($signos->signo as $signo) {                                                            
        $dataInicio = DateTime::createFromFormat('d/m', $signo->dataInicio);    // adicionando data de inicio e fim a cada signo 
        $dataFim = DateTime::createFromFormat('d/m', $signo->dataFim);
        $dataUsuario = DateTime::createFromFormat('d/m', $dia_mes);             // adicionando data de input do usuário 

        if (($dataUsuario >= $dataInicio) && ($dataUsuario <= $dataFim)) {                  // comparando data com cada signo no arquivo signos.xml
            return [
                "nome" => (string)$signo->signoNome,                                        // retornando nome do signo
                "descricao" => (string)$signo->descricao                                    // retornando descrição do signo
            ];
        }
    }

    return null;
}

$resultado = verificar_signo($data_nascimento, $signos);

if ($resultado) {                                                                           // alterando o body
    echo "<div class='container mt-5'>";
    echo "<h2>Seu Signo é: {$resultado['nome']}</h2>";
    echo "<p>{$resultado['descricao']}</p>";
    echo "<a href='index.php' class='btn btn-secondary'>Voltar</a>";                        // alterando botão para retornar ao inicio
    echo "</div>";
} else {                    echo "";                                                        // caso a função não retorne um resultado
    echo "<div class='container mt-5'>";
    echo "<h2>Não foi possível determinar o signo.</h2>";
    echo "<a href='index.php' class='btn btn-secondary'>Voltar</a>";                        
    echo "</div>";
}

?>
