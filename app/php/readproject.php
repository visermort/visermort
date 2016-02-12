<?php
include_once 'function.php';
include_once 'phpsettings.php';

$projects = readProjects();//читаем проекты
foreach ($projects as $row) { //начинаем цикл
?>

<li class="page">
    <div class="projects-item">
        <div class="hover-img">
            <img src="<?php echo(appfiles.$row['image']);?>" height="120" alt="pagetitle" class="project-img">
            <div class="zoom-wrapper">
                <a href="<?php echo($row['url']);?>" target="_blank" class="zoom-link">Подробнее</a>
            </div>
        </div>
    </div>
    <h3 class="page-title">
        <?php echo($row['name']);?>
    </h3>
    <p class="page-description">
        <?php echo($row['decsription']);?>
    </p>
</li>


<?php }
//завершающая скобка
?>







