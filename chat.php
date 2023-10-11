<?php
session_start();
ob_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h2>Chat PHP</h2>
    <p>Bem vindo: 
        <span id="nome_usuario">
            <?= $_SESSION['usuario']?>
        </span>
    </p>
    

    <label for="txt_mensagem">Nova Mensagem</label>
    <input type="text" name="txt_mensagem" id="txt_mensagem" placeholder="Digite uma mensagem">
    <br>
    <input type="button" value="Enviar" onclick="enviar()">
    <br><br>
    <span id="mensagem_chat"></span>

    <script>
        const mensagemChat = document.getElementById("mensagem_chat");
        const ws = new WebSocket("ws://localhost:8080");

        ws.onopen = (e) => console.log('Conectado!');

        ws.onmessage = (msgRecebida) => {
            let res = JSON.parse(msgRecebida.data);
            mensagemChat.insertAdjacentHTML('beforeend',`${res.mensagem}<br>`)
        }

        const enviar = () => {
            let msg = document.getElementById("txt_mensagem");
            let nome = document.getElementById("nome_usuario").textContent;
            
            let dados = {
                mensagem: `${nome}: ${msg.value}`
            }
            
            ws.send(JSON.stringify(dados));
            mensagemChat.insertAdjacentHTML('beforeend',`${nome}: ${msg.value}<br>`)
            msg.value = "";
        }
    </script>
</body>

</html>