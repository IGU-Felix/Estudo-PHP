 <?php include('header.php'); ?>                                                    <!-- << Coloca o Header na página puxando ele do arquivo header.php -->

<div class="container mt-5">                                                        <!-- Inicio da DIV -->
    <h2>Descubra o seu signo</h2>                                                   <!-- Titulo da Página -->
    <form id="signo-form" method="POST" action="show_zodiac_sigh.php">              <!-- Formulário chamando função -->
        <div class="mb-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento:</label>                             <!-- Label -->
            <input type="date" class="form-control" id="data_nascimento" name="data_nascimento" required>           <!-- Input data de Nascimento -->
        </div>
        <button type="submit" class="btn btn-primary">Consultar Signo</button>                                      <!-- Botão para chamar que inicia a função -->
    </form>
</div>


