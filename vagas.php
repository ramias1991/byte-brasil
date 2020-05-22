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
                    <h5 class="card-title"><?php echo $c++ . " - " . $vaga['titulo']; ?></h5>
                </div>
                <div class="card-body">
                    <strong>Função: </strong>
                    <?php echo $vaga['funcao']; ?><br>
                    <strong>Horário de Trabalho: </strong>
                    <?php echo $vaga['horario_trabalho']; ?><br>
                    <strong>Idade: </strong>
                    <?php echo $vaga['idade']; ?><br>
                    <strong>Sexo: </strong>
                    <?php echo $vaga['sexo']; ?><br>
                    <strong>Requisitos Profissionais: </strong>
                    <?php echo $vaga['requisitos_profissionais']; ?><br>
                    <strong>Local: </strong>
                    <?php echo $vaga['local']; ?><br>
                    <strong>Salário Oferecido: </strong>
                    <?php echo $vaga['salario']; ?><br>
                    <a class="btn btn-primary mt-2" href="candidatar_vaga?id_vaga=<?=$vaga['id']?>">Candidatar a Vaga</a>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach;?>
    </div>
</div>

<?php
require_once 'footer.php';
