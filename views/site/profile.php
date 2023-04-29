<?php

use Src\Auth\Auth;

?>
<div class="Info">

    <div>

        <p>Добро пожаловать, <?= app()->auth::user()->full_name ?> </p>
        <?php if (Auth::user()->role === 'Админ'): ?>
            <p class="cn">Выполни свои прямые обязанности!!! Внеси новых пользователей с систему</p>
            <a class="btm1" href="<?= app()->route->getUrl('/signup') ?>">Создать пользователя</a>
        <?php endif; ?>
        <?php if (Auth::user()->role === 'Методист'): ?>
            <p class="cn">Выполни свои прямые обязанности!!! Напиши уже новую методичку</p>
            <a class="btm1" href="<?= app()->route->getUrl('/createDoc') ?>">Создать документ</a>
        <?php endif; ?>

    </div>
    <img src="../../public/assets/image/книги.jpg" alt="Книги">
    </div>
    <div class="doc">
        <p>Документы</p>
        <div>
<!--            --><?php //foreach ($documents as $document)?>
            <a href="#">Все</a>
            <a href="#">Статус</a>
            <a href="#">Подразделение</a>
            <a href="#">Дисциплины</a>
        </div>
    <div class="list">
        <ol>
            <?php
            foreach ($documents as $document){
                echo '<a href=' . app()->route->getUrl('/viewDoc') . '?id=' . $document->id . '>' . '<li>' . $document->title . '</li>'.'</a>';
            }
            ?>
        </ol>
    </div>
