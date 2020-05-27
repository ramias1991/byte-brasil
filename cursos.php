<?php
require_once 'header.php';
$cursos = new Cursos();
$pag = 1;
if(isset($_GET['pag']) && !empty($_GET['pag'])){
   $pag = $_GET['pag'];
}
$qtdCursos = $cursos->countCursos(array('1'));;
$pagCurso = 4;
$offset = ($pag - 1) * $pagCurso;
$listaCursos = $cursos->getAllCursos(array('1'), $offset, $pagCurso);
?>

<div class="container">
    <h1 class="mt-5 mb-5">Cursos</h1>
    <?php
        if(count($listaCursos) <= 0){
            echo '<h4>Nenhum Curso Listado!<h4>';
        }
    ?>
    <table class="table table-hover mb-5">
        <tbody>
            <?php foreach($listaCursos as $curso):?>
                <tr>
                    <td><a href="curso?id=<?php echo $curso['id'];?>"><?php echo $curso['titulo'];?></a></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>
    <ul class="pagination d-flex justify-content-center mb-5">
        <?php
            $q = ceil($qtdCursos/$pagCurso);
            if($q > 1):
            for($i=1; $i <= $q; $i++):
        ?>
        <li class="page-item <?=($i==$pag)?'active':''?> mb-3" aria-current="page">
            <a class="page-link" href="cursos?pag=<?=$i?>"><?=$i?></a>
        </li>
        <?php endfor; endif;?>
    </ul>
</div>

<?php
require_once 'footer.php';
?>