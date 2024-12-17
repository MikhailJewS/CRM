{$header}
{$menu}
<h1>Список Цен</h1>

{if $error}
    <div class="error">{$error}</div>
{/if}

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Продукт</th>
            <th>Цена</th>
            <th>Действия</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$prices item=price}
        <tr>
            <td>{$price.id}</td>
            <td>{$price.product_name}</td>
            <td>{$price.amount|number_format:2:',':'.'}</td>
            <td>
                <a href="index.php?action=editPrice&id={$price.id}">Редактировать</a> |
                <a href="index.php?action=deletePrice&id={$price.id}" onclick="return confirm('Вы уверены, что хотите удалить эту цену?');">Удалить</a>
            </td>
        </tr>
        {/foreach}
    </tbody>
</table>

<a href="index.php?action=showAddPriceForm">Добавить новую цену</a>

{$footer}
