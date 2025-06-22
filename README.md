
# 🎶 Pulse | Sistema de Gerenciamento de Eventos

🚀 Projeto Fullstack PHP | Portfólio com foco em **boas práticas**, **segurança** e **arquitetura MVC**.

---

## 📌 Sobre o Projeto

O **Pulse** é uma plataforma web para gerenciamento de eventos, criada como parte da minha evolução como desenvolvedora .  
O projeto começou como um trabalho de faculdade, mas decidi recomeçar do zero e transformá-lo em um case real de portfólio, com foco em:

✅ Organização de código  
✅ Segurança na autenticação  
✅ Conexão eficiente com banco de dados  
✅ E claro… uma interface limpa e funcional  



## 🌟 Como surgiu essa ideia?

Tudo começou de um jeito bem simples (e real): eu ia viajar para Santa Catarina e queria saber que eventos iam rolar naquelas datas.
Mas, tentando descobrir, percebi como era difícil encontrar informações organizadas…
Fui caçar no Instagram, abrir vários perfis de lugares diferentes… e mesmo assim, ficou super confuso.

Foi aí que me veio a ideia: "Por que não criar uma plataforma que facilite a vida de quem busca eventos por cidade e data?"

Coincidentemente, eu também estava começando um trabalho de faculdade sobre desenvolvimento web, então decidi juntar as duas coisas.
O primeiro resultado? Um sistema que até funcionava, mas estava longe do que eu imaginava…

Agora, com mais conhecimento, experiência e muita vontade de fazer diferente, estou recriando o Pulse do zero, com o carinho e o cuidado que ele merece.
Mais que um projeto de código, esse é um marco da minha jornada como desenvolvedora. 💜✨

---

## ✅ Funcionalidades Implementadas até o momento:

- Sistema de **Cadastro e Login de Usuários**  
  - Senhas protegidas com `password_hash`
  - Controle de sessões para usuários logados

- **CRUD completo de Eventos (Create, Read, Update, Delete)**  
  - Cadastrar, listar, editar e excluir eventos

- **Filtro de eventos por cidade** na listagem

- **Estrutura MVC:**  
  - Pastas separadas em: `models`, `views`, `controllers`, `config`, `public`

- **Conexão segura com MySQL via PDO (Singleton Pattern)**

- **Validação de dados no back-end**

- **Visual limpo e responsivo**, com CSS customizado (HTML5 + CSS3)

---

## 🛠️ Tecnologias Utilizadas:

- PHP (8+)
- MySQL (porta 3307)
- Padrão MVC
- PDO para banco de dados
- HTML5
- CSS3
- JavaScript (em breve: melhorias no front)

---

## 🗃️ Estrutura do Banco de Dados:

- **Tabela `usuarios`:**  
  - Campos: `id`, `nome`, `email`, `senha (hash)`

- **Tabela `eventos`:**  
  - Campos: `id`, `titulo`, `descricao`, `cidade`, `data_evento`, `usuario_id`

---

## 🚀 Como rodar o projeto localmente:

### Pré-requisitos:

- XAMPP ou similar
- PHP 8 ou superior
- MySQL (porta 3307)

### Passo a passo:

1. Clone o repositório:

2. Copie a pasta do projeto para o **htdocs** do XAMPP.

3. Crie o banco de dados:
- Abra o phpMyAdmin
- Crie o banco com o nome: `minipulse`
- Importe o arquivo `minipulse.sql` (disponível na raiz do projeto)

4. Configure o arquivo `/config/config.php` com os seus dados de conexão (host, user, senha, porta, nome do banco).

5. Acesse pelo navegador:
```
http://localhost/Pulse/public/
```

---

## 💡 Diferenciais do Projeto:

- Código bem documentado com comentários explicativos  
- Estrutura de pastas organizada 
- Foco em segurança (uso de PDO + Prepared Statements + Hash de senhas)  
- Fácil de testar e replicar em outros ambientes  

---

## 👩‍💻 Próximos Passos (Roadmap):

- Integração com sistema de venda de ingressos
- Implementação de códigos promocionais
- Sistema de recompensas para usuários
- Melhorias visuais com frameworks front-end

---

## 🎥 Redes sociais (Onde estou compartilhando a evolução):

Acompanhe os bastidores e o desenvolvimento desse projeto também no meu TikTok:  
👉 @amanda.devup   (www.tiktok.com/@amanda.devup)
👉 @amandadevup   (https://www.linkedin.com/in/amandadevup/)



---

## 📣 Feedbacks são bem-vindos!

Se tiver sugestões de melhorias ou quiser bater um papo sobre o projeto, me chama! 😄


