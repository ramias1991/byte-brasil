<?php
require_once 'header.php';
$cursos = new Cursos();
$listaCursos = $cursos->getAllCursos(array('1'));
?>

<div class="container">
    <h1 class="mt-5">Cursos</h1>
    <table class="table table-hover">
        <tbody>
            <?php foreach($listaCursos as $curso):?>
                <tr>
                    <td><a href="curso?id=<?php echo $curso['id'];?>"><?php echo $curso['titulo'];?></a></td>
                </tr>
            <?php endforeach;?>
        </tbody>
    </table>  
</div>

<?php
require_once 'footer.php';
?>