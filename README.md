# Reading List

Reading List is a small app for keeping track of books you want to read, are reading, or have finished.
You can add, edit, delete, and filter books by status.

## Setup

You need PHP, Composer, and SQLite installed.

```bash
git clone https://github.com/KevinYadavRBU/honours-project.git
cd honours-project
composer install
cp .env.example .env
php artisan key:generate
```

In Windows PowerShell, use `Copy-Item .env.example .env` instead of `cp`.

Create the SQLite database file:

```bash
# macOS or Linux
touch database/database.sqlite
```

```powershell
# Windows PowerShell
New-Item database/database.sqlite -ItemType File
```

Then run the migrations and start Laravel's development server:

```bash
php artisan migrate
php artisan serve
```

With Herd, configure the site to use `reading-list.test`.

## AI usage

**Edit this section before submission so it accurately describes your work.**

I used [Copilot SDK in VS Code / replace this with the AI tool you actually used] to scaffold the code step by step, and I reviewed and understood every line. [Confirm or edit this statement honestly.]
