<?php include('layouts/header.php'); ?>
<?php
$data_nascimento = $_POST['data_nascimento'] ?? '';
$signos = simplexml_load_file("signos.xml");
?>
<body>
    <div class="container py-5">
        <p class="text-center">Data informada: <?= htmlspecialchars($data_nascimento) ?></p>

        <?php foreach ($signos->signo as $signo): ?>
            <div class="card mb-3">
                <div class="card-body">
                    <h5 class="card-title"><?= $signo->signoNome ?></h5>
                    <h6 class="card-subtitle mb-2 text-muted"><?= $signo->dataInicio ?> – <?= $signo->dataFim ?></h6>
                    <p class="card-text"><?= $signo->descricao ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
