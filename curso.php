<?php
require_once 'header.php';
$cursos = new Cursos($pdo);
if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = addslashes($_GET['id']);
    $curso = $cursos->getCurso($id);
} else {
    echo "<script>";
    echo "alert('Opa!! Aconteceu algum problema!! Tente novamente!!');";
    echo "window.location.href = 'cursos.php';";
    echo "</script>";
}

$title = null;
?>

<div class="container mt-3 mb-5">
    <p><a href="cursos.php" class="link"><< Voltar</a></p>
    <h1><?php echo utf8_encode($curso['titulo']);?></h1>
    <div class="card mb-3">
        <div class="img-curso" style='background-image:url("<?php echo 'assets/img/' . $curso['imagem'] . '.jpg';?>")'></div>
        <div class="card-body mb-1">
            <table class="table mb-1 table-hover">
                <tbody class=>
                    <tr class="row">
                        <td class="col-md-4"><strong>Conteúdos: </strong></td>
                        <td class="col-md-8"><?php echo utf8_encode($curso['conteudos']);?></td>
                    </tr>
                    <tr class="row">
                        <td class="col-md-4"><strong>Duração: </strong></td>
                        <td class="col-md-8"><?php echo utf8_encode($curso['duracao']);?></td>
                    </tr>
                    <tr class="row">
                        <td class="col-md-4"><strong>Opções: </strong></td>
                        <td class="col-md-8"><?php echo utf8_encode($curso['opcoes']);?></td>
                    </tr>
                    <tr class="row">
                        <td class="col-md-4"><strong>A quem se destina: </strong></td>
                        <td class="col-md-8"><?php echo utf8_encode($curso['a_quem_se_destina']);?></td>
                    </tr>
                    <tr class="row">
                        <td class="col-md-4"><strong>Objetivo: </strong></td>
                        <td class="col-md-8"><?php echo utf8_encode($curso['objetivo']);?></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</div>

<?php
require_once 'footer.php';
?>