<div class="wrapper">
    <div class="ticket">
        <table>
            <tr>
                <th style="width: 13.1%;"><label for="type">Тип заявки:</label></th>
                <td><select id="type">
                    <option value="service">Обслуживание</option>
                    <option value="repair">Ремонт</option>
                    <option value="accident">Инцидент</option>
                    <option value="other">Другое</option>
                </select></td>
                <th style="width: 16%;"><label for="hardware">Оборудование:</label></th>
                <td><select id="hardware">
                    <option value="video">Видеонаблюдение</option>
                    <option value="ops">ОПС</option>
                    <option value="skud">СКУД</option>
                    <option value="other">Другое</option>
                </select></td>
            </tr>
        </table> 
        <table>   
            <tr>
                <th style="width: 11%;"><label for="customer">Заказчик:</label></th>
                <td><input id="customer" type="text"></td>
            </tr>
        </table>
        <table>
            <tr>
                <th style="width: 11%;"><label for="description">Описание:</label></th>
                <td><textarea id="description" rows="5"></textarea></td>
            </tr>
        <table>
            <tr>
                <th style="width: 23.25%;"><label for="date">Дата и время заявки:</label></th>
                <td style="width: 34.2%;"><input id="date" type="date" style="width: auto"><input id="time" type="time" style="width: auto"></td>
                <th style="width: 12%;"><label for="priority">Приоритет:</label></th>
                <td><select id="priority">
                    <option value="1">Низкий</option>
                    <option value="2">Средний</option>
                    <option value="3">Высокий</option>
                </select></td>
            </tr>
        </table>
        <table>
            <tr>
                <th style="width: 28%;"><label for="contact">Контакты ответственного лица от заказчика:</label></th>
                <td><input id="contact" type="text"></td>
            </tr>
            <tr>
                <th style="width: 28%;"><label for="executor">Ответственное лицо от поставщика:</label></th>
                <td><input id="executor" type="text"></td>
            </tr>
        </table>
        <button id="addNewTicket">Отправить</button>
    </div>
</div>