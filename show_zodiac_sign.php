<?php include('layouts/header.php'); ?>
<?php
$data_nascimento = trim($_POST['data_nascimento'] ?? '');
$signos = simplexml_load_file("signos.xml");

// Converte uma data "dd/mm" do XML em uma data válida usando o ano informado
function criarData($dia_mes, $ano)
{
    return DateTime::createFromFormat('!d/m/Y', $dia_mes . '/' . $ano);
}

// Valida a data digitada no formato dd/mm/aaaa
function validarDataNascimento($data)
{
    $nascimento = DateTime::createFromFormat('!d/m/Y', $data);
    $erros = DateTime::getLastErrors();

    if (!$nascimento || ($erros && ($erros['warning_count'] > 0 || $erros['error_count'] > 0))) {
        return null;
    }

    return $nascimento;
}

// Procura o signo cujo range (dataInicio – dataFim) contém a data de nascimento
function buscarSigno($signos, $nascimento)
{
    $ano = $nascimento->format('Y');

    foreach ($signos->signo as $signo) {
        $inicio = criarData((string) $signo->dataInicio, $ano);
        $fim = criarData((string) $signo->dataFim, $ano);

        if ($inicio <= $fim) {
            if ($nascimento >= $inicio && $nascimento <= $fim) {
                return $signo;
            }
        } else {
            // Range que atravessa a virada do ano (ex.: Capricórnio, 22/12 – 19/01)
            if ($nascimento >= $inicio || $nascimento <= $fim) {
                return $signo;
            }
        }
    }

    return null;
}

$nascimento = validarDataNascimento($data_nascimento);
$signo = $nascimento ? buscarSigno($signos, $nascimento) : null;
?>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <?php if ($signo): ?>
                    <div class="card signo-card text-center border-0 shadow">
                        <div class="card-body py-5">
                            <h1 class="signo-nome display-4"><?= $signo->signoNome ?></h1>
                            <p class="signo-periodo mb-4"><?= $signo->dataInicio ?> – <?= $signo->dataFim ?></p>
                            <p class="signo-descricao lead px-md-5"><?= $signo->descricao ?></p>
                        </div>
                    </div>
                    <p class="text-center text-muted mt-3">
                        Data informada: <?= htmlspecialchars($data_nascimento) ?>
                    </p>
                <?php else: ?>
                    <div class="alert alert-danger text-center" role="alert">
                        Data inválida: "<?= htmlspecialchars($data_nascimento) ?>".
                        Informe a data no formato dd/mm/aaaa.
                    </div>
                <?php endif; ?>

                <div class="text-center mt-4">
                    <a href="index.php" class="btn btn-outline-primary">&larr; Voltar</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
