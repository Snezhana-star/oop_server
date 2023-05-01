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
    <img src="../../../mvc/public/assets/image/книги.jpg" alt="Книги">
    </div>
    <div class="doc">
        <p>Документы</p>
        <div>

            <form method="post" class="search">
                <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
                <a href="<?= app()->route->getUrl('/profile') ?>">Все</a>
                <label for="status">Статус: </label>
                <select name="status">
                    <option value="0"> </option>
                    <option value="Новый">Новый</option>
                    <option value="Одобрено">Одобрено</option>
                    <option value="Неодобрено">Неодобрено</option>
                </select>

                <label for="discription">Описание: </label>
                <select id="discription" name="discription">
                    <option value="Лекция">Лекция</option>
                    <option value="Практика">Практика</option>
                    <option value="Презентация">Презентация</option>
                </select>

                <label for="subdivision">Подразделение: </label>
                <select name="subdivision">
                    <?php foreach ($subdivisions as $subdivision) { ?>
                        <option value="<?= $subdivision->title ?>"><?= $subdivision->title ?></option>
                    <?php } ?>
                </select>

                <label for="discipline">Дисциплина: </label>
                <select name="discipline">
                    <?php foreach ($disciplines as $discipline) { ?>
                        <option value="<?= $discipline->title ?>"><?= $discipline->title ?></option>
                    <?php } ?>
                </select>
                <button>Поиск</button>
            </form>
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
