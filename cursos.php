<?php
require_once 'header.php';
$cursos = new Cursos();
$listaCursos = $cursos->getAllCursos();
?>

<div class="container">
    <h1 class="mt-5">Cursos</h1>
    <table class="table table-hover">
        <tbody>
            <?php foreach($listaCursos as $curso):?>
            <?php if($curso['status'] == 1):?>
                <tr>
                    <td><a href="curso.php?id=<?php echo $curso['id'];?>"><?php echo utf8_encode($curso['titulo']);?></a></td>
                </tr>
            <?php endif;?>
            <?php endforeach;?>
        </tbody>
    </table>  
</div>

<?php
require_once 'footer.php';
?>