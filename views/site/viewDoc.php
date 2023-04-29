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
<div class="textdoc">
    <p><?php
        foreach ($viewdocs as $viewdoc) {
            echo $viewdoc->text;
        }
        ?>
    </p>
</div>