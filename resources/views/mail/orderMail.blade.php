<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste</title>
    <style type="text/css">
        :root,body,html,div{
            margin:0;
            padding:0;
            box-sizing: border-box;
            --ciano-color:#268ce6;
            --azul-bebe:#4682B4;
        }
        body{
            background-color: var(--azul-bebe);
        }
        header{
            background-color: var(--ciano-color);
            padding: 15px;
            margin-bottom: 10px;
        }
        nav{
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        nav > h2{
            color:white;
            font-size: 1.5em;
            font-family: Arial, Helvetica, sans-serif;
        }
        .line{
            max-width: 800px;
            border:2px solid white;
            margin:0 auto;
        }
        .container{
            display: grid;
            grid-template-columns: repeat(2,1fr);
            max-width: 800px;
            margin:0 auto;
            gap:10px;
            margin-top:10px;
        }
        .containerContact{
            background-color: var(--ciano-color);
            padding: 15px;
        }
        .containerContact > div{
            display: grid;
            grid-template-columns: 1fr; 
            gap: 40px;
            background-color: white;
            padding: 10px;
        }
        .containerContact > div > h3{
            color:var(--azul-bebe);
            font-size: 1.8em;
            font-family: Arial, Helvetica, sans-serif;
        }
        .containerContact > div > span{
            color:var(--azul-bebe);
            font-size: 1.3em;
        }
        .containerInfoImovel{
            background-color: var(--ciano-color);
            padding: 15px;
        }
        .containerInfoImovel > div {
            display: grid;
            grid-template-columns: 1fr; 
            gap: 10px;
            background-color: white;
            padding: 10px;
        }
        .containerInfoImovel > div > h3{
            color:var(--azul-bebe);
            font-size: 1.8em;
            font-family: Arial, Helvetica, sans-serif;
        }
        .containerInfoImovel > div > span{
            color:var(--azul-bebe);
            font-size: 1.3em;
        }
        .address{
            padding: 5px;
            border: 2px solid var(--azul-bebe);
        }
        .address > p{
            color: var(--azul-bebe);
            font-size: 1.4em;
        }
        .address > h4{
            color:var(--azul-bebe);
            font-size: 1.8em;
        }
        footer{
            background-color: var(--ciano-color);
            flex:1;
            margin-top: 25px;
            display: flex;
            align-items: center;
            font-family: Arial, Helvetica, sans-serif;
            color:white;
            font-size: 1.5rem;
            justify-content: center;
        }

        @media (max-width:600px){
            .container{
                grid-template-columns: 1fr;
            }
            footer{
                font-size: 1em;
            }
        }
        @media (max-width:768px){
            .containerContact > div > h3{
                color:var(--azul-bebe);
                font-size: 2em;
                font-family: Arial, Helvetica, sans-serif;
            }
            .containerContact > div > span{
                color:var(--azul-bebe);
                font-size: 1.5em;
            }
            .containerInfoImovel > div > h3{
                color:var(--azul-bebe);
                font-size: 2em;
                font-family: Arial, Helvetica, sans-serif;
            }
            .containerInfoImovel > div > span{
                color:var(--azul-bebe);
                font-size: 1.5em;
            }
        }
        @media (max-width:345px){
            .containerContact > div{
                box-sizing: border-box;
            }
            .containerContact > div > span{
                font-size: 1.1em;
            }
            .containerContact > div > h3{
                text-align: center;
            }
            .containerInfoImovel > div {
                box-sizing: border-box;
            }
            .containerInfoImovel > div > h3{
            text-align: center;
            }
            .containerInfoImovel > div > span{
                font-size: 1.1em;
            }
            .address{
                padding: 10px;
            }
            .address > p{
                font-size: 1.1em;
            }
            .address > h4{
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <h2>{{$username}}</h2>
            <h2>Cod {{$imovel->id}}</h2>
        </nav>
        <div class="line"></div>
    </header>

    <div class="line"></div>

    <div class="container">
        <div class="containerContact">
            <div>
                <h3>Usuário</h3>
                <span><strong>Email:</strong> {{$email}}</span>
                <span><strong>Nome:</strong>{{$username}}</span>
                <span><strong>Data:</strong> {{$data}}</span>
                <span><strong>Mensagem:</strong> {{$msg}}</span>
            </div>
        </div>
        <div class="containerInfoImovel">
            <div>
                <h3>Imovel</h3>
                
                <span><strong>Codigo:</strong>{{$imovel->id}}</span>
                <span><strong>Titulo:</strong> {{$imovel->title}}</span>
                <span><strong>Status:</strong> {{$imovel->status}}</span>
                <span><strong>Tipo:</strong> {{$imovel->type}}</span>
                <span><strong>Quartos:</strong> {{$imovel->dorms}}</span>
                <span><strong>Preço:</strong> R$ {{$imovel->price}}</span>

                <div class="address">
                    <h4>Endereço</h4>
                    <p>{{$imovel->address->city}} / {{$imovel->address->neigh}} / {{$imovel->address->cep}}</p>
                </div>

            </div>
        </div>
    </div>
    <footer>
        <h1>MyImoveisMG</h1>
    </footer>
</body>
</html>