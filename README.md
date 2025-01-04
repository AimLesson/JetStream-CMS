# Gerson JetStream CMS

A Laravel-based content management system (CMS) built using **Filament Admin Panel**, designed for managing branches, news, profiles, and user authentication with role-based access control (RBAC).

## Features

### 1. **User Management**
- Role-based access control (RBAC):
  - **Superadmin**: Full access to all resources.
  - **Yayasan**: Manage branches, approve news, and view reports.
  - **Branch Manager**: Manage news for their assigned branch.
- Users are tied to specific branches, with automatic branch filtering.
- Personal profile management:
  - Users can edit their name, email, and password (excluding roles and branches).

### 2. **Branch Management**
- Manage information for branches:
  - Name
  - Company profile
  - Logo upload
  - About section
  - Contact information (phone, address)

### 3. **News Management**
- Features:
  - Title, content, image upload, author, and publication status.
  - Support for embedding YouTube, Instagram, and TikTok links.
  - News views tracking (daily and total views).
- Role-based permissions:
  - Only superadmins, yayasan, and branch managers can manage news within their roles/branches.
- Published/unpublished news counts displayed on the dashboard.

### 4. **Dashboard**
- Widgets for quick insights:
  - **Stats Overview**:
    - Total news, daily news count, published/unpublished news, and total views.
  - **All News Table**:
    - View all news in a table format with filters and actions.
    - Delete and view options for individual news items.
  - Full-row layout for better visibility.

### 5. **My Profile**
- Users can edit their own profile.
- Role and branch editing restricted for all users.

## Installation

### Requirements
- PHP 8.1+
- Composer
- Laravel 10.x
- MySQL or any compatible database
- Node.js (optional for frontend assets)

### Setup Instructions

1. **Clone the Repository**:
   ```bash
   git clone <repository-url>
   cd <repository-directory>
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   npm install && npm run dev
   ```

3. **Set Environment Variables**:
   Copy the `.env.example` file to `.env` and update the database and application details:
   ```bash
   cp .env.example .env
   ```

4. **Run Migrations and Seeders**:
   Run the migrations to create the database structure:
   ```bash
   php artisan migrate --seed
   ```

5. **Create Storage Link**:
   Create a symbolic link for file storage:
   ```bash
   php artisan storage:link
   ```

6. **Start the Development Server**:
   ```bash
   php artisan serve
   ```

7. Access the app at [http://localhost:8000](http://localhost:8000).

## Usage

### Roles and Permissions
- Log in as a **superadmin** to configure initial users, branches, and profiles.

### Filament Admin Panel
Access the Filament admin panel at `/admin`:
- Superadmins can manage everything.
- Other roles have restricted access based on their permissions.

## Customization

### Configurations
- Update branding in `config/filament.php`:
  ```php
  'brand' => 'Your Custom Brand Name',
  ```

### Adding Widgets
- Extend dashboard widgets by creating new ones using:
  ```bash
  php artisan make:filament-widget WidgetName
  ```

## File Structure
- **Branches**: `App\Filament\Resources\BranchResource`
- **News**: `App\Filament\Resources\NewsResource`
- **Users**: `App\Filament\Resources\UserResource`
- **Profile Page**: `App\Filament\Pages\MyProfile`

## License
This project is licensed under the [MIT License](LICENSE).

## Contribution
Pull requests are welcome. For significant changes, please open an issue first to discuss what you would like to change.

## Acknowledgements
- [Laravel](https://laravel.com/)
- [Filament Admin Panel](https://filamentphp.com/)
- [Heroicons](https://heroicons.com/)