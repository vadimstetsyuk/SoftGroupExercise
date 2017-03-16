<form method="post" action="/index.php/edit_news">
    <div>
        <label for="id">№ Новини: </label>
        <select name="id">
            <?php foreach ($items as $item) : ?>
            <option value=$item['id']>
                <?=$item['id']?>
            <option>
            <?php endforeach; ?>
        </select>
    </div>
    <div>
        <label for="title">Назва новини: </label>
        <input type="text" name="title" />
    </div>
    <div>
        <label for="link">Посилання: </label>
        <input type="text" name="link" />
    </div>
    <div>
        <label for="description">Опис новини: </label>
        <input type="text" name="description" />
    </div>
    <div>
        <label for="source">Джерело: </label>
        <input type="text" name="source" />
    </div>
    <div>
        <input type="submit" value="Зберегти новину" />
    </div>
</form>