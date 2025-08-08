# 📌 Working time

**PT**:
O **Working Time** é um sistema de controle de tempo de trabalho desenvolvido com Laravel, PostgreSQL e Docker. O objetivo principal é colocar em prática os estudos de programação sobre Laravel e seus recursos, como:
- Blade para construção de interfaces gráficas
- Estrutura MVC, um padrão de arquitetura de desenvolvimento muito eficiente para pequenos projetos
- Laravel UI facilita a construção de interfaces gráficas com Bootstrap
- Laravel UI Auth ajuda a gerenciar a autenticação de usuários baseada em sessão

**EN**:
**Working Time** is a time tracking system developed with Laravel, PostgreSQL, and Docker. Its main objective is to put into practice programming knowledge about Laravel and its features, such as:
- Blade for building graphical interfaces
- MVC structure, a very efficient development architecture pattern for small projects
- Laravel UI makes it easy to build graphical interfaces with Bootstrap
- Laravel UI Auth helps manage session-based user authentication

---

## 🌟 Funcionalidades / Features

**PT**:
- **Gerenciar marcações de entrada e saída de trabalho**
- **Ajuste de tempo**
- **Visualizar tabela de pontos por mês**

**EN**:
- **Manage work clock-in and clock-out**
- **Time adjustment**
- **View timesheet by month**

---

## 🛠️ Tecnologias Utilizadas / Technologies

**PT**:
- **Linguagem**: [PHP](https://www.php.net/)
- **Framework**: [Laravel](https://laravel.com/)
- **Banco de Dados**: [PostgreSQL](https://www.postgresql.org/)
- **Ferramentas**: [Docker](https://www.docker.com/)

**EN**:
- **Language**: [PHP](https://www.php.net/)
- **Framework**: [Laravel](https://laravel.com/)
- **Database**: [PostgreSQL](https://www.postgresql.org/)
- **Tools**: [Docker](https://www.docker.com/)

---

## ⚙️ Instalação / Installation

**PT**:
1. **Clone o repositório**:
   ```bash
   git clone https://github.com/thiago662/working-time.git
   cd working-time
   ```

2. **Instale as dependências**:
   ```bash
   composer install
   ```

3. **Configure o ambiente**:
   - Copiar e arquivo `.env.exemple` e alterar o nome para `.env`, alem disso será necessario alterar as varivais `DB_` que são relacionadas ao banco de dados com os valores do seu banco de dados.

4. **Levantar infraestrutura de banco de dados em docker**:
   - Rodar o comando `docker compose up -d` no terminal, isso ira subir uma maquina virtual com um banco de dados PostgreSQL.

5. **Rodar migrations**:
   - Para criar a estrutura do banco de dados basta rodar o comando `php artisan migrete` que vai rodas todas as migrations no banco criando sua estrutura base.

6. **Execute o projeto**:
   ```bash
   php artisan serve  # Backend
   npm run dev  # Frontend
   ```

**EN**:
1. **Clone the repository**:
   ```bash
   git clone https://github.com/thiago662/working-time.git
   cd working-time
   ```

2. **Install dependencies**:
   ```bash
   composer install
   ```

3. **Configure the environment**:
   - Copy the `.env.example` file and change the name to `.env`. You will also need to change the `DB_` variables related to the database to the values from your database.

4. **Set up database infrastructure in Docker**:
   - Run the `docker compose up -d` command in the terminal. This will create a virtual machine with a PostgreSQL database.

5. **Run migrations**:
   - To create the database structure, simply run the `php artisan migrete` command, which will run all migrations in the database, creating its base structure.

6. **Run the project**: 
   ```bash 
   php artisan serves # Backend 
   npm run dev # Frontend 
   ```

---

## ✉️ Contato / Contact

**Thiago Gonçalves Santos** - [@thiago662](https://github.com/thiago662) - thiago1santos12@gmail.com

**PT**:
🔗 **Link do Projeto**: [https://github.com/thiago662/working-time](https://github.com/thiago662/working-time)

**EN**:
🔗 **Project Link**: [https://github.com/thiago662/working-time](https://github.com/thiago662/working-time)

---

### 📌 Notas Adicionais / Additional Notes

**PT**:
- Se trata de um projeto pequeno e particular.
- Seu principal intuido é para estudos e pratica de programação.

**EN**:
- This is a small and private project.
- Its main purpose is for studying and practicing programming.

![GitHub last commit](https://img.shields.io/github/last-commit/thiago662/working-time)

---
