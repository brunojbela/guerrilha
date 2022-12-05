##Bem vindo ao Workflow Ref+

Infos gerais 

###Back-end
Utilizamos o Docker 3.3
Imagem Wordpress mais recente
MySQL 5.7
Adminer mais recente

localhost na porta: 8080
Adminer na porta: 8888

###Front-End
 * utilizamos o gulp / sass como pré-processador 
 * GULP versão 4.0.2
 * Bootstrap 4 

 * browser Sync porta 3000
 * lembrete atualizar porta proxis target no Gulpfiles

 * lembre alterar variavel projet_name

 * comando 'gulp deploy qa' sobe todos arquivos para um servidor de homologação em uma pasta com o nome da variavel projet_name 

 ###Controle de versão 
 * Nome do repositório : {tecnologia}-{nome do projeto}
 * Todos os repositório são privados
 * Incluir informações importantes no README.md
 * Criar branch referente ao desenvolvimento, exemplo template
 * Pós aprovação merge para branch master 
