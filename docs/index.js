/* DESENVOLVIDO POR HUGO BARBATTO*/
            /* global $ amount portion parcelas_1 parcelas_2 parcelas_3 valor_total recebera_loja parcelas_loja valor_parcela_maquina valor_maquina*/
            $('#amount').mask('000.000.000.000.000,00', {reverse: true});
           $('.super-destaque').hide();
            // amount.onkeyup = calcValues;
            // portion.onchange = calcValues;
            // calcValues();
            function calcValues(){
                var a = parseFloat(amount.value.replace(/[.]/g, '').replace(',','.'));
                // var a = parseFloat(amount.value); 
                if(a > 0){
                    valor_total.innerText =  a.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
                
                    var t = parseFloat(portion.value);
                    var p = document.querySelector('option[value="'+portion.value+'"]').innerText.replace('parcelas','').trim();
                    
                    
                    var r = (a*(100/(100-t)));
                    var r_p = (r/parseInt(p));
                    var r2 = (a * ( 1 - ( t / 100) ) );
                    var r2_p = (a / parseInt(p) );
                    
                    valor_maquina.innerText = r.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}) ;
                    valor_parcela_maquina.innerText =r_p.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}) ;
                    
                    recebera_loja.innerText =r2.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}) ;
                    parcelas_loja.innerText =r2_p.toLocaleString('pt-br',{style: 'currency', currency: 'BRL'}) ;
                    
                    // parcelas_1.innerText =
                     parcelas_2.innerText = parcelas_3.innerText = p;
                    $('.super-destaque').fadeIn();
                }
                
            }
            