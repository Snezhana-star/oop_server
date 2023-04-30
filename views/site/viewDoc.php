<?php

use Src\Auth\Auth;

?>
<div class="Info">

    <div>


        <p><?php
            foreach ($viewdocs as $viewdoc) {
                echo $viewdoc->title;
            }
            ?>
        </p>
        <p><?php
            foreach ($viewdocs as $viewdoc) {
                echo '<p class="stat">Описание: ' . $viewdoc->discription . '</p>';
                echo '<p class="stat">Статус: ' . $viewdoc->status . '</p>';
                echo '<p class="stat">Дата создания: ' . $viewdoc->date_of_creation . '</p>';
                echo '<p class="stat">Автор: ' . $viewdoc->author . '</p>';
                echo '<p class="stat">Подразделение: ' . $viewdoc->subdivision . '</p>';
                echo '<p class="stat">Дисциплина: ' . $viewdoc->discipline . '</p>';
            }
            ?>


    </div>
    <img src="../../public/assets/image/книги.jpg" alt="Книги">
</div>
<div class="ttt">
    <p>Текст</p>
    <?php if (Auth::user()->role === 'Админ'): ?>
    <a href="<?= app()->route->getUrl('/statusUpdate')  ?>">Изменить статус</a>
    <?php endif; ?>
    <a href="<?= app()->route->getUrl('/updateDoc') ?>">Изменить документ</a>
</div>
<div class="textdoc">
    <p><?php
        foreach ($viewdocs as $viewdoc) {
            echo $viewdoc->text;
        }
        ?>
    </p>
</div>