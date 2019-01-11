# calendario-diaadia
Calendario dinamico para acesso a visualização dos dados diários na intranet do HMMG

Os dados diários são fornecidos por uma aplicação na intranet 
por este motivo a classe trabalha exclusivamente no sentido de 
chamar os arquivos php da aplicação, sem qualquer preocupação de generalização.

** Este projeto é destinado para uso interno do Hospital Municipal Dr. Mário Gatti**

## Propósito
Evitar que fosse necessário criar os calendários individualmente para cada mês

## Funcionamento
Ao utilizar a chamada `CalendarioMesesAnos::exibeDesde( ano_inicial )` é gerado um Calendário com os meses do ano até o mes/ano atual iniciando por este último. Ao clicar sobre o mês abre o calendário do mês correspondente com cada dia do mes sendo um link para uma aplicação php que com base nos parâmetro enviado gera os dados daquele dia.

## Autor
Núcleo de Informática do Hospital Municipal Dr. Mário Gatti
Anderson Pajewski - Agente de Suporte em Tecnologias (equivalente a Técnico de Informática)