<?php include('layouts/header.php'); ?>
<body>
    <div class="container py-5">
        <h1 class="text-center mb-4 fw-light">Descubra seu signo:</h1>
        <hr>

        <div class="row justify-content-center mt-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm p-4">
                    <form id="signo-form" method="POST" action="show_zodiac_sign.php">
                        <div class="mb-3 text-center">
                            <label for="data_nascimento" class="form-label">Data de nascimento</label>
                            <input type="text" class="form-control" id="data_nascimento" name="data_nascimento"
                                placeholder="Ex.: 21/05/1992" required
                                pattern="\d{2}/\d{2}/\d{4}" maxlength="10"
                                title="Informe a data no formato dd/mm/aaaa">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Descobrir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
