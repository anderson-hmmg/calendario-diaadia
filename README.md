# calendario-diaadia
Calendario dinâmico para acesso a visualização dos dados diários na intranet do HMMG

Os dados diários são fornecidos por uma aplicação na intranet por este motivo a classe trabalha exclusivamente no sentido de chamar os arquivos php da aplicação, sem qualquer preocupação de generalização.

** Este projeto é destinado para uso interno do Hospital Municipal Dr. Mário Gatti**

## Propósito
Evitar que fosse necessário criar os calendários individualmente para cada mês

## Autor
Núcleo de Informática do Hospital Municipal Dr. Mário Gatti

*Anderson Pajewski* - Agente de Suporte em Tecnologias[^1]
[^1] equivalente a Técnico de Informática

## Funcionamento
Ao utilizar a chamada `CalendarioMesesAnos::exibeDesde( ano_inicial )` é gerado um Calendário com os meses do ano até o mes/ano atual iniciando por este último. Ao clicar sobre o mês abre o calendário do mês correspondente com cada dia do mes sendo um link para uma aplicação php que com base nos parâmetro enviado gera os dados daquele dia.

## Descrição dos arquivos
* index.php - Arquivo que utiliza a classe na estrutura da intranet para exibir os meses dos anos de `ano_inicial` até o ano/mês atual.
* CalendarioMesesAnos.class.php - Classe criada para exibir os meses dos anos dinamicamente.
* CalendarioMes.class.php - Classe que gera o calendario do mês, utilizada pela classe CalendarioMesesAnos