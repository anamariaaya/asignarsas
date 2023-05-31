<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email {
    public $sqr;
    
    public function __construct($sqr)
    {
        $this->sqr = $sqr;
    }

    public function enviarConfirmacionSQR() {
        //
        // Email para la persona que genero ls SQR, informando que se ha recibo la SQR y se le dara tramite
        //

        // create a new object
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];    
    
        $mail->setFrom('no-reply@asignar.com.co');
        $mail->addAddress($this->sqr->email, $this->sqr->nombre);
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
        $contenido .= "<h1><strong>Hola, " . $this->sqr->nombre . " " .  $this->sqr->apellido .  "</strong></h1>";
        $contenido .= "<p class='subtitulo'>¡Has enviado una SQR!</p>";   
        $contenido .= "<p>Tu solicitud está siendo gestionada y te responderemos a la mayor brevedad posible.</p></br>";
        $contenido .= "<p>Gracias por contactarnos.</p>";
        $contenido .= "<p class='firma'>Equipo Asignar</p>";
        $contenido .= '</html>';
        $contenido .= "<p><span>Este correo electrónico fue enviado desde una dirección solamente de notificaciones que no puede aceptar correos electrónicos entrantes. Por favor no respondas a este mensaje.</span></p>";
        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();

        //
        // Email para la empresa (mietras se implementa la interface de usuario de las SQR)
        //

        // create a new object
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASS'];
    
        $mail->setFrom('no-reply@asignar.com.co');

        if ($this->sqr->tipo_usuario=="Empresas"){
            $mail->addAddress('gerenciaop@asignar.com.co', 'Contacto Comercial');
        } else { // Empleados
            $mail->addAddress('sqr@asignar.com.co', 'Contacto Comercial');
        }

        $mail->addAddress('rtangarife@gmail.com', 'TICs');
        $mail->Subject = 'SQR ' . $this->sqr->tipo_usuario . ': ' . $this->sqr->nombre . ' ' . $this->sqr->fecha_rep;
        // Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "
        <html>
            <style>
                @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap');
                h1 {
                font-size: 24px;
                font-weight: 600;
                line-height: 25px;
                color: #070056;
                }

                body {
                    font-family: 'Poppins', sans-serif;
                    background-color: #ffffff;
                    max-width: 400px;
                    padding: 50px;
                }
            
                p {
                    line-height: 18px;
                }
                p span {
                    font-size: 12px;
                    color: #333333;
                }
                .line::after {
                    content: '';
                    position: absolute;
                    top: 12%;
                    left: 3%;
                    width: 50%;
                    height: 1px;
                    background: #0da6f3;
                    z-index: -1;
                }
            </style>
            <body>
                <h1 class='line'>¡Nueva SQR " . $this->sqr->tipo_usuario . "!</h1>

                <p><strong>Tipo: </strong>" . $this->sqr->tipo . "</p>
                <p><strong>Fecha: </strong>" . $this->sqr->fecha_rep . "</p>
                
                <p>Estos son los datos enviados por el cliente:</p>

                <p><strong>Nombre: </strong>" . $this->sqr->nombre . "</p>
                <p><strong>Apellido: </strong>" . $this->sqr->apellido . "</p>
                <p><strong>Documento: </strong>" . $this->sqr->doc_id . "</p>
                <p><strong>Teléfono: </strong>" . $this->sqr->tel . "</p>
                <p><strong>Email de contacto: </strong>" . $this->sqr->email . "</p>
                <p><strong>Dirección: </strong>" . $this->sqr->direccion . "</p>

                <p><strong>Lugar de los hechos: </strong>" . $this->sqr->lugar_hechos . "</p>
                <p><strong>Motivo: </strong>" . $this->sqr->motivo . "</p>
                <p><strong>SQR: </strong>" . $this->sqr->solicitud . "</p>
            </body>
        </html>";

        $mail->Body = $contenido;

        //Enviar el mail
        $mail->send();
    }
}