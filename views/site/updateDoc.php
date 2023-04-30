<h3 class="error"><?= $message ?? ''; ?></h3>
<form class="sign" method="post">
<!--    <input name="csrf_token" type="hidden" value="--><?php //= app()->auth::generateCSRF() ?><!--"/>-->
    <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

    <label for="title">Название </br></label>
    <input type="text" name="title" value="<?= $docs['title'] ?>">


    <label for="discription">Описание</br></label>
    <select id="discription" name="discription">
        <option value="Лекция" >Лекция</option>
        <option value="Практика">Практика</option>
        <option value="Презентация">Презентация</option>
    </select>

    <label for="text"> Содержание </br></label>
    <input type="text" name="text" value="<?= $docs['text'] ?>">

    <label for="status">Статус</br></label>
    <select id="status" name="status"">
        <option value="Новый">Новый</option>
    </select>

    <label for="date_of_creation">Дата создания </br></label>
    <input type="date" name="date_of_creation" value="<?= $docs['date_of_creation'] ?>"  >


    <button>Изменить</button>
</form>