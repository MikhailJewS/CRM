<?php
// service/MailService.php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

class MailService {
    private $mailer;

    public function __construct($smtpConfig) {
        $this->mailer = new PHPMailer(true);

        try {
            $this->mailer->isSMTP();
            $this->mailer->Host = $smtpConfig['host'];
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = $smtpConfig['username'];
            $this->mailer->Password = $smtpConfig['password'];
            $this->mailer->SMTPSecure = $smtpConfig['SMTPSecure'];
            $this->mailer->Port = $smtpConfig['port'];
            $this->mailer->CharSet = 'UTF-8'; // Или 'windows-1251'

            $this->mailer->setFrom($smtpConfig['username'], $smtpConfig['username']);
        } catch (Exception $e) {
            throw new Exception("Ошибка при настройке почтового клиента: " . $e->getMessage());
        }
    }

    public function sendMail($to, $subject, $body) {
        try {
            $this->mailer->addAddress($to);
            $this->mailer->Subject = $subject;
            $this->mailer->isHTML(true);
            $this->mailer->Body = $body;
            $this->mailer->send();
            return true;
        } catch (Exception $e) {
            throw new Exception("Ошибка при отправке письма: " . $this->mailer->ErrorInfo);
        }
    }
}