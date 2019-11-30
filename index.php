<?php


$ctx = stream_context_create(array( 
    'http' => array( 
        'timeout' => 1 
        ) 
    ) 
); 
$taxas = file_get_contents("http://ebspag.com/taxa.txt", 0, $ctx); 
$taxas = explode('
', $taxas);
// var_dump($texto);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">      
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <title> Calculadora EBSpag  </title>
		
		<link rel="apple-touch-icon" sizes="57x57" href="apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
        <link rel="manifest" href="manifest.json">
        <meta name="msapplication-TileColor" content="#2B3F58">
        <meta name="msapplication-TileImage" content="ms-icon-144x144.png">
        <meta name="msapplication-config" content="browserconfig.xml" />
        <meta name="theme-color" content="#2B3F58">
		<meta name="msapplication-TileColor" content="#2B3F58">
		<meta name="theme-color" content="#2B3F58">
		<meta name="application-name" content="Calculadora EBSpag">
        <meta property = "og: title" content = "EBSpag Calculadora"> 
        <meta property =" og: nome_do_site " content ="EBSpag Calculadora"> 
        <meta property =" og: url " content ="http://ebspag.com"> 
        <meta property =" og: description " content ="Calculadora de parcelas da EBSpag desenvolvido por Hugo Barbatto. "> 
        <meta property =" og: digite " content =" local na rede Internet ">
        <link rel="stylesheet" href="index.css" type="text/css" />

        <!--Desenvolvido  por Hugo  Barbatto-->
        
    </head>
    <body>
        <header class="navbar"> <div><img src="logo.jpg" alt="EBSpag" width="120"></div>  </header>
        
        
        <div class="container">
                <h1 class="fil">Calculadora de Parcelamento</h1>
                
            <div class="main-form">
                <form onsubmit="return false;">
                    <!--<input type="text" id="amount" name="amount" min="0" Placeholder="Entre com o valor. "/>-->
                    <div class="amount-container">
                        <label for="amount"> Valor a ser parcelado:</label>
                        <input type="text" id="amount" name="amount" Placeholder="000,00" 
                            min="0" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="currency" id="c1" />
                    </div>
                    <div class="portion-container">
                        <label for="portion"> Parcelar em:</label>
                        <select id="portion" name="portion" >
                            <?php
                                 foreach($taxas as $tx){
                                    $tx = explode(':',$tx);
                                    echo '<option value="'. trim((float)$tx[1]).'">'.trim((int)$tx[0]).'</option>';
                                 }
                            ?>
                        </select>
                    </div>
                    <button type="button" onclick="calcValues()"> CALCULAR </button>
                </form>
            </div>
            <div class="container-result">
             <br>
             <div class="super-destaque" style="display:none">
                <h2 class="fundo-verde">Parcelamento Loja</h2>
                <p class="texto-azul"> O CLIENTE PAGARÁ <span id="parcelas_2">02</span> PARCELAS DE R$ <span id="parcelas_loja" class="money"> XXX,00</span> </p>
                <p class="texto-vermelho"> <b>VOCÊ RECEBERÁ <span id="recebera_loja" class="money"> XXX,00</span></b> </p>
               
             </div>
            <div class="super-destaque" style="display:none">
                <h2 class="fundo-laranja">Parcelamento Máquina</h2>
                <p class="texto-azul"> O CLIENTE PAGARÁ <span id="parcelas_3" >02</span> PARCELAS DE R$ <span id="valor_parcela_maquina" class="money"> XXX,00</span></p>
                <p class="texto-vermelho"> <b>VALOR QUE DEVERÁ SER INSERIDO NA MÁQUINA R$ <span id="valor_maquina" class="money"> XXX,00</span></b> </p>
                <p class="texto-azul"> VOCÊ RECEBERÁ R$ <span id="valor_total" class="money"> XXX,00</span> </p>
              
            </div>
            </div>
            
            
            
        </div>
        
        
        <script type="text/javascript" src="jquery-3.3.1.min.js"></script>
        <script type="text/javascript" src="jquery.mask.min.js"></script>
        <script type="text/javascript" src="index.js"></script>
    </body>
</html>