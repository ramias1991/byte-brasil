<?php
require_once 'header.php';
$vagas = new Vagas();
$listaVagas = $vagas->getAllVagas();
?>
<div class="container">
    <h1 class="mt-5">Vagas</h1>
    <?php
        if(count($listaVagas) <= 0){
            echo "<h4>Nenhuma vaga listada!<h4>";
        }
    ?>
    <div class="row">
        <?php $c = 1;?>
        <?php foreach($listaVagas as $vaga):?>
        <?php if($vaga['status'] == 1):?>
        <div class="col-sm-6">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title"><?php echo $c++ . " - " . utf8_encode($vaga['titulo']); ?></h5>
                </div>
                <div class="card-body">
                    <strong>Função: </strong>
                    <?php echo utf8_encode($vaga['funcao']); ?><br>
                    <strong>Horário de Trabalho: </strong>
                    <?php echo utf8_encode($vaga['horario_trabalho']); ?><br>
                    <strong>Idade: </strong>
                    <?php echo utf8_encode($vaga['idade']); ?><br>
                    <strong>Sexo: </strong>
                    <?php echo utf8_encode($vaga['sexo']); ?><br>
                    <strong>Requisitos Profissionais: </strong>
                    <?php echo utf8_encode($vaga['requisitos_profissionais']); ?><br>
                    <strong>Local: </strong>
                    <?php echo utf8_encode($vaga['local']); ?><br>
                    <strong>Salário Oferecido: </strong>
                    <?php echo utf8_encode($vaga['salario']); ?><br>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach;?>
    </div>
</div>

<?php
require_once 'footer.php';
