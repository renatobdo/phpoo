<!DOCTYPE html>
<html>
<head>
    <title>Menu do Usuário</title>
    <style>
        /* ... estilos do menu ... */

        .user-dropdown {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            background-color: #333;
            min-width: 120px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .user-photo:hover + .user-dropdown {
            display: block;
        }

        .user-dropdown a {
            display: block;
            color: #fff;
            padding: 10px;
            text-decoration: none;
        }

        .user-dropdown a:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <div class="menu">
        <div class="user-info">
            <div class="user-photo">
                
                <div class="user-dropdown">
                    <a href="#">Meu Perfil</a>
                    <a href="#">Configurações</a>
                    <a href="logout.php">Sair</a>
                </div>
            </div>
            <div class="user-name">Nome do Usuário</div>
        </div>
    </div>
</body>
</html>
