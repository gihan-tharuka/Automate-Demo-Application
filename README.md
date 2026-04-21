# AutoMate - Automotive Service Management System

## 🚗 Overview

AutoMate is a comprehensive automotive service management system designed for auto repair shops, garages, and service centers. It streamlines the process of managing vehicle servicing, customer information, job tracking, inventory, and billing in one intuitive platform.

## ✨ Features

- **Vehicle Management**: Track customer vehicles, service history, and details
- **Job Cards**: Create, assign, and track service jobs with detailed requirements
- **Invoicing System**: Generate professional invoices with line items and payment tracking
- **Inventory Management**: Track parts, products, and stock movements
- **Customer Portal**: Allow customers to view their vehicles and service history
- **Technician Assignment**: Assign technicians to specific job cards
- **Analytics & Reporting**: Business insights and service performance metrics

## 🛠️ Technology Stack

- **Backend**: Laravel 12.x
- **Admin Panel**: Filament 4.x
- **Frontend**: Livewire 3.x, Blade Templates
- **Authentication**: Laravel Fortify, Jetstream
- **Database**: SQLite (development), MySQL/PostgreSQL (production)
- **Styling**: Tailwind CSS
- **PDF Generation**: DomPDF

## 📋 Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js & NPM
- Required PHP Extensions:
  - BCMath
  - Ctype
  - Fileinfo
  - JSON
  - Mbstring
  - OpenSSL
  - PDO
  - Tokenizer
  - XML
  - Intl
  - Zip

## 🚀 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/gihan-tharuka/Automate-Demo-Application.git
   cd AutoMate
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install JavaScript dependencies**
   ```bash
   npm install
   ```

4. **Create environment file**
   ```bash
   cp .env.example .env
   ```

5. **Generate application key**
   ```bash
   php artisan key:generate
   ```

6. **Configure database connection in .env file**
   ```
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=automate
   DB_USERNAME=root
   DB_PASSWORD=
   ```

7. **Run migrations and seed database**
   ```bash
   php artisan migrate --seed
   ```

8. **Create symbolic link for storage**
   ```bash
   php artisan storage:link
   ```

9. **Compile assets**
   ```bash
   npm run dev
   ```

10. **Start the development server**
    ```bash
    php artisan serve
    ```

## ⚙️ Configuration

### File Storage

By default, the application uses the local file system. You can configure different storage options in the `.env` file:

```
FILESYSTEM_DISK=public
```

### Email Configuration

Configure email settings in the `.env` file for sending notifications:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
```

## 📱 Usage

### Admin Panel

1. Access the admin panel at `/admin`
2. Login with admin credentials:
   - Email: admin@example.com
   - Password: password

### Managing Vehicles

1. Navigate to the Vehicles section
2. Add new vehicles with customer information, make, model, and year
3. Upload vehicle photos for better identification

### Creating Job Cards

1. Select a vehicle and customer
2. Add customer requirements and vehicle condition
3. Assign a technician
4. Schedule the job

### Generating Invoices

1. Navigate to Invoices
2. Create a new invoice
3. Add line items for parts and labor
4. Process payment and send to customer

## 📊 Database Schema

The application uses several key models:

- **User**: Customers and staff members
- **Vehicle**: Customer vehicles with details
- **JobCard**: Service tickets with requirements
- **Invoice**: Billing records with payment information
- **Product**: Parts and services inventory
- **StockMovement**: Inventory transactions

## 🧪 Testing

Run the test suite with:

```bash
php artisan test
```

## 👥 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the LICENSE file for details.

## 🙏 Acknowledgments

- [Laravel](https://laravel.com)
- [Filament](https://filamentphp.com)
- [Livewire](https://livewire.laravel.com)
- [Tailwind CSS](https://tailwindcss.com)


## 📞 Contact

For support or inquiries, please contact [gihantharuka2499@mail.com](mailto:gihantharuka2499@mail.com)

