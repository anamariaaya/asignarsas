<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    
    public function __construct($email, $nombre)
    {
        $this->email = $email;
        $this->nombre = $nombre;
    }

    public function enviarConfirmacionSQR() {

         // create a new object
         $mail = new PHPMailer();
         $mail->isSMTP();
         $mail->Host = $_ENV['EMAIL_HOST'];
         $mail->SMTPAuth = true;
         $mail->Port = $_ENV['EMAIL_PORT'];
         $mail->Username = $_ENV['EMAIL_USER'];
         $mail->Password = $_ENV['EMAIL_PASS'];
     
         $mail->setFrom('no-reply@asignar.com.co');
         $mail->addAddress($this->email, $this->nombre);
         $mail->Subject = 'Hemos recibido tu solicitud';

         // Set HTML
         $mail->isHTML(TRUE);
         $mail->CharSet = 'UTF-8';

         $contenido = '<html>';
         $contenido .= "<style>
                        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap');
                        h1 {
                        font-size: 26px;
                        font-weight: 600;
                        line-height: 25px;
                        color: #070056;
                        }

                        body {
                            font-family: 'Poppins', sans-serif;
                            background-color: #ffffff;
                            max-width: 600px;
                            padding: 50px;
                        }
                    
                        p {
                            line-height: 1.4;
                        }
                        p span {
                            font-size: 12px;
                            color: #333333;
                            font-style: italic;
                        }
                        .subtitulo{
                            font-size: 20px;
                            font-weight: 600;
                            text-decoration: 3px underline;
                            text-underline-offset: 5px;
                            color: #0da6f3;
                            margin-bottom: 45px;
                            margin-top: 25px;
                        }
                        .firma{
                            text-decoration: underline;
                            color: #070056;
                        }
                    </style>";
         $contenido .= "<h1><strong>Hola, " . $this->nombre .  "</strong></h1>";
         $contenido .= "<p class='subtitulo'>¡Has enviado una SQR!</p>";   
         $contenido .= "<p>Tu solicitud está siendo gestionada y te responderemos a la mayor brevedad posible.</p></br>";
         $contenido .= "<p>Gracias por contactarnos.</p>";
         $contenido .= "<p class='firma'>Equipo Asignar</p>";
         $contenido .= '</html>';
         $contenido .= "<p><span>Este correo electrónico fue enviado desde una dirección solamente de notificaciones que no puede aceptar correos electrónicos entrantes. Por favor no respondas a este mensaje.</span></p>";
         $mail->Body = $contenido;

         //Enviar el mail
         $mail->send();

    }
}