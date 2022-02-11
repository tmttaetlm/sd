<?php
namespace Models;
use Core\Model;
use Components\Db;

class TicketModel extends Model 
{
    public function __construct($view) {
        parent::__construct();
        $this->view = $view;
    }   
    
    public function addNewTicket($params)
    {
        $query = "INSERT INTO sd_tickets (type,hardware,description,customer,datetime,priority,contact,executor,status)
                  VALUES (:type,:hardware,:description,:customer,:datetime,:priority,:contact,:executor,'send');";
        $db = Db::getDb();
        $db->selectQuery($query,$params);

        $recipient = 'helpshamdan@gmail.com';
        $text = 'Ваша заявка отправлена в службу поддержки ТОО "ШамДан". После исполнения заявки вы получите уведомление на почту.';
        sendMail($recipient, $text);
        $recipient = 'info@shamdan.kz';
        $text = 'Получена новая заявка.';
        sendMail($recipient, $text);
    }

    public function changeStatus($params)
    {
        $query = "UPDATE sd_tickets SET status = :val WHERE id = :id";
        $db = Db::getDb();
        $db->selectQuery($query,$params);

        $recipient = 'helpshamdan@gmail.com';
        $text = 'Ваша заявка исполнена. Спасибо за обращение.';
        sendMail($recipient, $text);
    }

    public function sendMail($recipient, $text)
    { 
        $subject = 'Круглосуточная служба поддержки ТОО "ШамДан"'; 
        $message = '<p style="font-size: 18px;">'.$text.'</p>';
        $message = $message.'<br><br>Это письмо сформировано и отправлено автоматически. Отвечать на него не нужно.';
        $headers = 'From:  Cлужба поддержки ТОО "ШамДан" <info@shamdan.kz>'.'\r\n'.
                   'Reply-To: info@shamdan.kz'.'\r\n'.
                    'MIME-Version: 1.0'.'\r\n'.
                    'Content-Type: text/html;';
        mail($recipient, $subject, $message, $headers);
    }

}
               
