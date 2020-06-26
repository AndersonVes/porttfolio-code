<?php
require "PHPMailer/PHPMailerAutoload.php";

function smtpmailer($to, $from, $from_name, $subject, $body)
    {
        $mail = new PHPMailer();
        $mail -> CharSet = "UTF-8";
        $mail->IsSMTP();
        $mail->SMTPAuth = true; 
 
        $mail->SMTPSecure = 'ssl'; 
        $mail->Host = 'mail.andersonvgb.com';
        $mail->Port = 465;  
        $mail->Username = 'contato@andersonvgb.com';
        $mail->Password = 'Password';   
   
   //   $path = 'reseller.pdf';
   //   $mail->AddAttachment($path);
   
        $mail->IsHTML(true);
        $mail->From="contato@andersonvgb.com";
        $mail->FromName=$from_name;
        $mail->Sender=$from;
        $mail->AddReplyTo($from, $from_name);
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        if(!$mail->Send())
        {
            $error = 1;
            return $error; 
        }
        else 
        {
            $error = 0;  
            return $error;
        }
    }

    $fNome = $_POST["nome"];
    $fEmail = $_POST["email"];
    $fTelefone = $_POST["telefone"];
    $fMensagem = $_POST["mensagem"];
    
    $to   = 'contato@andersonvgb.com';
    $from = 'contato@andersonvgb.com';
    $name = 'Formulario Contato - Site';
    $subj = 'Formulario - Site';
    $msg = '<b>Nome: </b>'.$fNome.' <br /> <b>Email: </b>'.$fEmail.' <br /> <b>Telefone: </b>'.$fTelefone.' <br /> <b>Mensagem: </b>'.$fMensagem;
    
    $error=smtpmailer($to,$from, $name ,$subj, $msg);

    
    header('Location: '.'https://www.andersonvgb.com/');
    
    
?>