<html>
<head>
    <title>Prncipal</title>
    <style>
        /* Estilo geral para a div externa */
        .container {
            
        }

        /* Estilo para o cabeçalho */
        .header {
            
        }

        /* Estilo para o menu */
        .menu {
            width: 200px;
            float: left;
            background-color: #f4f4f4;
            height: 400px; /* Defina a altura que deseja ou deixe o conteúdo ajustar */
        }

        /* Estilo para o conteúdo */
        .content {
            margin-left: 200px; /* Espaço à esquerda igual à largura do menu */
            background-color: #ddd;
            height: 400px; /* Defina a altura que deseja ou deixe o conteúdo ajustar */
        }

        /* Limpeza de floats */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }
    </style>
</head>
<body>

<div style="width: 800px; margin: 0 auto;">
    <div style="height: 100px; width: 100%; background-color: #4CAF50;";>
        <h1>Cabeçalho</h1>
    </div>
        <div style="width: 200px; float: left; background-color: #f4f4f4; height: 400px;">
            <h2>Menu</h2>
            <p>Item 1</p>
            <p>Item 2</p>
            <p>Item 3</p>
        </div>

        <div style=" float:left;  background-color: #ddd; height: 400px; width: 600px;">
            <h2>Conteúdo</h2>
            <p>Aqui vai o conteúdo principal.</p>
        </div>
</div>

</body>
</html>
