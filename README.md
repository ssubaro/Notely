# Notely API

A Laravel-based RESTful API for managing personal notes. This application allows you to create, read, update, and delete notes with features for organization and classification.

## 📝 Overview

Notely provides a simple yet powerful API to manage your personal notes. Each note contains:
- Title
- Author
- Date and time
- Body content
- Classification

## 🚀 Getting Started

### Prerequisites
- PHP 8.1 or higher
- Composer
- MySQL

### Installation

1. Clone the repository
```bash
git clone https://github.com/yourusername/notely.git
cd notely
Install dependencies

bash
composer install
Set up environment variables
Create a .env file in the root directory by copying .env.example:

bash
cp .env.example .env
Then update the database configuration:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=notely_db
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
Generate application key

bash
php artisan key:generate
Run database migrations

bash
php artisan migrate
Start the development server

bash
php artisan serve
The API will be available at: http://localhost:8000

🔌 API Endpoints
Notes
Method	Endpoint	Description
GET	/api/notes	Get all notes
GET	/api/notes/{id}	Get a specific note
POST	/api/notes	Create a new note
PUT	/api/notes/{id}	Update a note
DELETE	/api/notes/{id}	Delete a note
📋 Usage Examples
Create a new note
bash
curl -X POST http://localhost:8000/api/notes \
  -H "Content-Type: application/json" \
  -d '{
    "title": "Meeting Notes",
    "author": "John Doe",
    "date_time": "2025-04-27 14:30:00",
    "body": "Discussed project timeline and resource allocation.",
    "classification": "Work"
  }'
Get all notes
bash
curl -X GET http://localhost:8000/api/notes
Get a specific note
bash
curl -X GET http://localhost:8000/api/notes/1
Update a note
bash
curl -X PUT http://localhost:8000/api/notes/1 \
  -H "Content-Type: application/json" \
  -d '{
    "title": "Updated Meeting Notes",
    "body": "Added new discussion points and action items."
  }'
Delete a note
bash
curl -X DELETE http://localhost:8000/api/notes/1
🛠️ Technologies Used
Laravel - PHP Framework

MySQL - Database

📄 License
This project is licensed under the MIT License - see the LICENSE file for details.

🤝 Contributing
Fork the project

Create your feature branch (git checkout -b feature/amazing-feature)

Commit your changes (git commit -m 'Add some amazing feature')

Push to the branch (git push origin feature/amazing-feature)

Open a Pull Request
