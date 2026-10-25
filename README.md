# Descubra seu Signo

Aplicação web simples feita com **PHP puro**, **HTML** e **Bootstrap**. O usuário informa a data de nascimento em um formulário e a aplicação mostra o signo do zodíaco correspondente, buscando as informações em um arquivo **XML**.

> **Disciplina:** Programação Web\
> **Unidade:** U1 – Fundamentos da Web com HTML5\
> **Aula:** A4 – Exercícios Práticos com HTML\
> **Atividade:** Desenvolvimento de uma aplicação PHP com formulário e XML para consulta de signos

## Objetivo

Criar uma aplicação web dinâmica usando PHP puro. A atividade trabalha:

- manipulação de arquivos XML;
- criação de formulários HTML;
- uso de lógica condicional;
- estilização com Bootstrap.

Ao final, o sistema deve identificar e exibir o signo zodiacal do usuário com base na data de nascimento.

## Como funciona

1. Na página inicial (`index.php`), o usuário preenche o campo **`data_nascimento`** (ex.: `21/05/1992`) e clica em **Descobrir**.
2. O formulário é enviado via **POST** para `show_zodiac_sign.php`.
3. O PHP lê a data com `$_POST['data_nascimento']` e carrega o XML com `simplexml_load_file("signos.xml")`.
4. O script percorre os signos (`$signo->dataInicio`, `$signo->dataFim`, ...) e verifica em qual intervalo a data de nascimento se encaixa.
5. A página mostra o nome e a descrição do signo encontrado, com um link para voltar à página inicial.

```
[index.php] --POST data_nascimento--> [show_zodiac_sign.php] --lê--> [signos.xml]
                                                |
                                                v
                                      [Nome + descrição do signo]
```

## Estrutura do projeto

> **Nota:** a estrutura final do projeto ainda não está definida.

Como referência, a apostila propõe a seguinte estrutura:

```
Project/
├── assets/
│   ├── css/
│   │   └── style.css
│   ├── imgs/
│   └── js/
├── layouts/
│   └── header.php
├── index.php
├── show_zodiac_sign.php
└── signos.xml
```

| Arquivo                | Função                                                                       |
|------------------------|------------------------------------------------------------------------------|
| `header.php`           | Topo do HTML (até o fim do `<head>`), com o link do Bootstrap                |
| `index.php`            | Inclui o `header.php`, mostra o título e o formulário (método POST)          |
| `show_zodiac_sign.php` | Inclui o `header.php`, recebe a data, consulta o XML e exibe o signo         |
| `signos.xml`           | Dados dos 12 signos                                                          |

## Dados dos signos (XML)

Os dados ficam no arquivo **`signos.xml`**, que deve ser preenchido manualmente com **todos os signos**. A estrutura segue o modelo da apostila (`docs/`):

```xml
<?xml version="1.0"?>
<signos>
  <signo>
    <dataInicio>21/03</dataInicio>
    <dataFim>20/04</dataFim>
    <signoNome>Áries</signoNome>
    <descricao>Lorem ipsum dolor sit amet.</descricao>
  </signo>
  <!-- ... demais signos ... -->
</signos>
```

| Campo        | Descrição                                |
|--------------|------------------------------------------|
| `dataInicio` | Primeiro dia do signo (formato `dd/mm`)  |
| `dataFim`    | Último dia do signo (formato `dd/mm`)    |
| `signoNome`  | Nome do signo                            |
| `descricao`  | Texto descritivo exibido para o usuário  |

Fonte sugerida pela apostila para as datas: [Signo astrológico – Wikipédia](https://pt.wikipedia.org/wiki/Signo_astrol%C3%B3gico).
