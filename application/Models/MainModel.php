<?php

namespace Models;
use Core\Model;
use Components\Db;

class MainModel extends Model {
    
    public function __construct()
    {
        parent::__construct();
    }
    
    public function getTickets()
    {
        $query = "SELECT * FROM sd_tickets;";
        $db = Db::getDb();
        $data = $db->selectQuery($query,[]);
        $data = $this->addRowNumbers($data);
        for ($i=0; $i<count($data); $i++) {
            switch ($data[0]['type']) {
                case 'service': $data[0]['type'] = 'Обслуживание'; break;
                case 'repair': $data[0]['type'] = 'Ремонт'; break;
                case 'accident': $data[0]['type'] = 'Инцидент'; break;
                case 'other': $data[0]['type'] = 'Другое'; break;
            }
            switch ($data[0]['hardware']) {
                case 'video': $data[0]['hardware'] = 'Видеонаблюдение'; break;
                case 'ops': $data[0]['hardware'] = 'ОПС'; break;
                case 'skud': $data[0]['hardware'] = 'СКУД'; break;
                case 'other': $data[0]['hardware'] = 'Другое'; break;
            }
            switch ($data[0]['priority']) {
                case '1': $data[0]['priority'] = 'Низкий'; break;
                case '2': $data[0]['priority'] = 'Средний'; break;
                case '3': $data[0]['priority'] = 'Высокий'; break;
            }
            switch ($data[0]['status']) {
                case 'send':
                    if ($_SESSION['role'] == 'admin') {
                        $data[0]['status'] = '<select id="status">
                                                <option value="send" selected>Отправлена</option>
                                                <option value="received">Получена</option>
                                                <option value="work">На исполнении</option>
                                                <option value="done">Исполнено</option>
                                              </select>';
                    } else { $data[0]['status'] = 'Отправлена'; };
                    break;
                case 'received':
                    if ($_SESSION['role'] == 'admin') {
                        $data[0]['status'] = '<select id="status">
                                                <option value="send">Отправлена</option>
                                                <option value="received" selected>Получена</option>
                                                <option value="work">На исполнении</option>
                                                <option value="done">Исполнено</option>
                                              </select>';
                    } else { $data[0]['status'] = 'Получена'; };
                    break;
                case 'work':
                    if ($_SESSION['role'] == 'admin') {
                        $data[0]['status'] = '<select id="status">
                                                <option value="send">Отправлена</option>
                                                <option value="received">Получена</option>
                                                <option value="work" selected>На исполнении</option>
                                                <option value="done">Исполнено</option>
                                              </select>';
                    } else { $data[0]['status'] = 'На исполнении'; };
                    break;
                case 'done':
                    if ($_SESSION['role'] == 'admin') {
                        $data[0]['status'] = '<select id="status">
                                                <option value="send">Отправлена</option>
                                                <option value="received">Получена</option>
                                                <option value="work">На исполнении</option>
                                                <option value="done" selected>Исполнено</option>
                                              </select>';
                    } else { $data[0]['status'] = 'Исполнено'; };
                    break;
            }
            $year = substr($data[0]['datetime'],0,4);
            $month = substr($data[0]['datetime'],5,2);
            $day = substr($data[0]['datetime'],8,2);
            $time = substr($data[0]['datetime'],11,5);
            $data[0]['datetime'] = $day.'.'.$month.'.'.$year.' '.$time;
        }
        return $data;
    }
}
