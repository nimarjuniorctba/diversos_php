<?php

header("Content-Type: application/xml; charset=utf-8");

$con = new mysqli("localhost", "root", "", "okmotoboyexpress");
$con->set_charset("utf8");

if ($con->connect_error) {
    echo "<?xml version='1.0' encoding='UTF-8'?>";
    echo "<retorno>";
    echo "<acesso>negado</acesso>";
    echo "<mensagem>Erro de conexão</mensagem>";
    echo "</retorno>";
    exit;
}

function limparXml($texto)
{
    return htmlspecialchars($texto ?? '', ENT_XML1, 'UTF-8');
}

function salvarLogNegado($email, $senha)
{
    $pasta = __DIR__ . "/logs/acesso_negado/";

    if (!is_dir($pasta)) {
        mkdir($pasta, 0777, true);
    }

    $arquivo = $pasta . "acesso_" . date("Hi_m_Y") . "_" . uniqid() . ".txt";

    $ip = $_SERVER['REMOTE_ADDR'] ?? 'IP desconhecido';
    $dataHora = date("d/m/Y H:i:s");
    $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? 'Desconhecido';

    /*
        Por segurança, não é recomendado salvar senha pura no log.
        Aqui salvo apenas uma versão mascarada.
    */
    $senhaMascarada = str_repeat("*", strlen($senha));

    $conteudo  = "ACESSO NEGADO\n";
    $conteudo .= "-----------------------------\n";
    $conteudo .= "Data/Hora: " . $dataHora . "\n";
    $conteudo .= "Email informado: " . $email . "\n";
    $conteudo .= "Senha informada: " . $senhaMascarada . "\n";
    $conteudo .= "IP: " . $ip . "\n";
    $conteudo .= "Navegador/App: " . $userAgent . "\n";
    $conteudo .= "-----------------------------\n\n";

    file_put_contents($arquivo, $conteudo, FILE_APPEND);
}

$email = strtolower(trim($_POST['email'] ?? $_GET['email'] ?? ''));
$senha = trim($_POST['senha'] ?? $_GET['senha'] ?? '');

if ($email == '' || $senha == '') {

    salvarLogNegado($email, $senha);

    echo "<?xml version='1.0' encoding='UTF-8'?>";
    echo "<retorno>";
    echo "<acesso>negado</acesso>";
    echo "<mensagem>Email ou senha não informado</mensagem>";
    echo "</retorno>";
    exit;
}

$sql = $con->prepare("
    SELECT 
        con_id,
        con_nome,
        con_telefone,
        con_email,
        con_placa,
        con_senha
    FROM mod_condutor
    WHERE con_email = ?
    AND con_cad_status = 'a'
    LIMIT 1
");

$sql->bind_param("s", $email);
$sql->execute();

$resultado = $sql->get_result();

if ($resultado->num_rows == 1) {

    $usuario = $resultado->fetch_assoc();

    /*
        Se sua senha foi salva com password_hash(), usa password_verify().
        Se ainda estiver salvando senha pura, a segunda comparação mantém compatibilidade.
    */
    $senhaValida = false;

    if ($senha === $usuario['con_senha']) {
        $senhaValida = true;
    }

    if ($senhaValida) {

        echo "<?xml version='1.0' encoding='UTF-8'?>";
        echo "<retorno>";
        echo "<acesso>01</acesso>";
        echo "<condutor>";
        echo "<id>" . limparXml($usuario['con_id']) . "</id>";
        echo "<nome>" . limparXml($usuario['con_nome']) . "</nome>";
        echo "<telefone>" . limparXml($usuario['con_telefone']) . "</telefone>";
        echo "<placa>" . limparXml($usuario['con_placa']) . "</placa>";
        echo "</condutor>";
        echo "</retorno>";
        exit;

    } else {

        salvarLogNegado($email, $senha);

        echo "<?xml version='1.0' encoding='UTF-8'?>";
        echo "<retorno>";
        echo "<acesso>00</acesso>";
        echo "<mensagem>Email ou senha inválidos</mensagem>";
        echo "</retorno>";
        exit;
    }

} else {

    salvarLogNegado($email, $senha);

    echo "<?xml version='1.0' encoding='UTF-8'?>";
    echo "<retorno>";
    echo "<acesso>negado</acesso>";
    echo "<mensagem>Email ou senha inválidos</mensagem>";
    echo "</retorno>";
    exit;
}

$sql->close();
$con->close();

?>