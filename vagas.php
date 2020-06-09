<?php
require_once 'header.php';
$vagas = new Vagas();
$pag = 1;
if(isset($_GET['pag']) && !empty($_GET['pag'])){
    $pag = $_GET['pag'];
}
$qtdVagas = $vagas->countVagas(array('1'));
$pagVagas = 4;
$offset = ($pag - 1) * $pagVagas;
$listaVagas = $vagas->getAllVagas(array('1'), $offset, $pagVagas, '');

?>
<div class="container d-flex justify-content-center">
    <button class="btn btn-info mt-4 mr-5" type="button" data-toggle="modal" data-target="#modal-como-candidatar">Como me candidatar?</button>
    <button class="btn btn-primary mt-4 ml-5 anuncia-vaga" type="button" data-toggle="modal" data-target="#modal-anunciar-vaga" data-link="anunciar_vaga">
        Precisa Contratar? É GRATUITO!
    </button>
</div>
<div id="modal-como-candidatar" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Para se candidatar as vagas:</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="">
                    <li class="mb-3">Você precisa comparecer pessoalmente com seus documentos ou um currículo atualizado em nosso endereço; Preencher um cadastro que tem validade por 6 meses;</li>
                    <li class="mb-3">Agendar a participação no treinamento preparatório para o mercado de trabalho que tem duração de 2 horas; <span class="text-danger">O treinamento é obrigatório e tem um custo único de R$ 50,00</span>.</li>
                    <p class="mb-3">E pronto! Você já pode participar da seleção de todas as vagas que estiver dentro dos critérios que a empresa exige e que você desejar.</p>

                    <li class="mb-4">Se você é de fora de concórdia consulte por <a href="fale-conosco">email</a> como poderá participar das seleções.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div id="modal-anunciar-vaga" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content modal-content-anunciar-vaga">
            
        </div>
    </div>
</div>

<div class="container">
    <h1 class="mt-4">Vagas</h1>
    <?php
        if(count($listaVagas) <= 0){
            echo "<h4>Nenhuma vaga listada!<h4>";
        }
    ?>
    <div class="row">
        <?php
            $c = (($pag - 1)* $pagVagas) + 1;
        ?>
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
                    <!-- <a class="btn btn-primary mt-2" href="candidatar_vaga?id_vaga=<?=$vaga['id']?>">Candidatar a Vaga</a> -->
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endforeach;?>
    </div>

    <div>
        <ul class="pagination d-flex justify-content-center mt-5 mb-5">
        <?php
            $qtdPag = ceil($qtdVagas / $pagVagas);
            if($qtdPag > 1):
            for($i = 1; $i <= $qtdPag; $i++):
        ?>
            <li class="page-item <?=($pag==$i)?'active':''?>">
                <a href="vagas?pag=<?=$i?>" class="page-link"><?=$i?></a>
            </li>
        <?php endfor; endif;?>
        </ul>
    </div>
</div>

<?php
require_once 'footer.php';
