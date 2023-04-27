<div class="Info">
    <div>

        <p>Добро пожаловать, <?= app()->auth::user()->full_name ?> </p>
        <p class="cn">Выполни свои прямые обязанности!!! Внеси новых пользователей с систему</p>
        <a class="btm1" href="<?= app()->route->getUrl('/signup') ?>">Создать пользователя</a>
    </div>
    <img src="../../public/assets/image/книги.jpg" alt="Книги">
</div>
