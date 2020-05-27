<?php
require_once 'header.php';
$cursos = new Cursos();

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = addslashes($_GET['id']);
    $curso = $cursos->getCurso($id);
} else {
    echo "<script>";
    echo "alert('Opa!! Aconteceu algum problema!! Tente novamente!!');";
    echo "window.location.href = 'cursos';";
    echo "</script>";
}
?>

<div class="container mt-3 mb-5">
    <p><a href="javascript:history.back()" class="link"><< Voltar</a></p>
    <h2><?php echo $curso['titulo'];?></h2>
    <div class="card mb-3">
        <?php if($curso['imagem'] != ''): ?>
        <div>
            <img src="<?='assets/img/' . $curso['imagem']?>" alt="" class="img-fluid w-100">
        </div>
        <?php endif; ?>
        <div class="card-body mb-1">
            <table class="table mb-1 table-hover">
                <tbody class=>
                    <tr class="row">
                        <td class="col-md-4"><strong>Proposta do Curso: </strong></td>
                        <td class="col-md-8"><?php echo $curso['proposta_curso'];?></td>
                    </tr>
                    <tr class="row">
                        <td class="col-md-4"><strong>Grade Curricular: </strong></td>
                        <td class="col-md-8"><?php echo $curso['grade_curricular'];?></td>
                    </tr>
                    <tr class="row">
                        <td class="col-md-4"><strong>Opções de Aulas: </strong></td>
                        <td class="col-md-8"><?php echo $curso['opcoes_de_aulas'];?></td>
                    </tr>
                    <tr class="row">
                        <td class="col-md-4"><strong>Carga Horária: </strong></td>
                        <td class="col-md-8"><?php echo $curso['carga_horaria'];?></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
    <div class="">
        <h5 class="text-center">Maiores Informações: (49) 3442-4222 ou WhatsApp <a href="https://api.whatsapp.com/send?phone=+554998501422&text=Olá! Gostaria de mais informações sobre o curso de <?=$curso['titulo']?>" target="_blanck">(49) 98501-4222</a></h5>
    </div>
</div>

<?php
require_once 'footer.php';
?>