<form method="post" action="/index.php/delete_news">
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
        <input type="submit" value="Видалити новину" />
    </div>
</form>