<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Auto Complete</title>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
        <script type="text/javascript">
            $(document).ready(function () {

                // Captura o retorno do retornaCliente.php
                $.getJSON('retornaCliente.php', function (data) {
                    var setor = [];

                    // Armazena na array capturando somente o nome do cliente
                    $(data).each(function (key, value) {
                        setor.push(value.setor);
                    });

                    // Chamo o Auto complete do JQuery ui setando o id do input, array com os dados e o mínimo de caracteres para disparar o AutoComplete
                    $('#txtSetor').autocomplete({source: setor, minLength: 1});
                });
            });
        </script>
    </head>
    <body>
        <label>Cliente:</label>
        <input type="text" id="txtSetor" name="txtSetor" size="60"/>
        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui.js" type="text/javascript"></script>
    </body>
</html>