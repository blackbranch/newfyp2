<?php

?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contact Form</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/problemStylesheet.css" />

    </head>
    <body>
        <form name="frmContant" method="post" action="doContact.php">
            <h1>Contact Form :</h1>
            Your name: <input id="idName" type="text" name="name" />
            <br/>
            Email Address: <input id="idEmail" type="email" name="email" />
            <br/>
            Subject:<input id="idSubject" type="text" name="subject" />
            <br/>
            Message:
            <br/>
            <textarea id="idFeedback" rows="3" cols="10" name="feedback"></textarea>
            <br/><br/><br>
            <input type="submit" value="Submit Form" id="SubBut"/>
        </form>
    </body>
</html>
