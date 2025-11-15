# 🎓 BCA Student Portal

**Student Project - 5th Semester**

Hey there! 👋 This is my **BCA Student Portal** project - a web application I built to help manage student records efficiently. It's a simple but functional portal where you can add, view, edit, and delete student information.

## 👤 Author

This project was developed as part of my 5th Semester coursework in BCA (Bachelor of Computer Applications).

## 📝 What This Project Does

This portal allows you to:
- ✅ Register and login with secure password authentication
- ✅ View all student records in a clean dashboard
- ✅ Add new students to the database
- ✅ Edit existing student information
- ✅ Delete student records
- ✅ Search for students by name, department, or email
- ✅ Learn about the portal through the About section

## 🛠️ Technologies Used

- **PHP** - Backend logic and database operations
- **MySQL** - Database to store user and student data
- **HTML/CSS** - Frontend design and styling
- **JavaScript** - Form validation and interactive features

## 📋 Features

### Authentication System
- User registration with password confirmation
- Secure login with session management
- Password hashing for security
- First-time login redirects to About page

### Student Management
- View all students in a table format
- Add new students with name, department, and email
- Edit student details
- Delete students with confirmation
- Search functionality across multiple fields

### UI/UX
- Modern and clean design
- Responsive navigation bar
- Beautiful footer with quick links
- Smooth hover effects and transitions
- Mobile-friendly layout

## 🚀 How to Set Up

### Prerequisites
- XAMPP (or any PHP server with MySQL)
- A web browser

### Installation Steps

1. **Clone or download this project**
   ```
   Place the student_portal folder in your htdocs directory
   (Usually: C:\xampp\htdocs\student_portal)
   ```

2. **Set up the Database**
   - Open phpMyAdmin (http://localhost/phpmyadmin)
   - Create a new database named `student_db`
   - Run these SQL commands to create tables:

   ```sql
   CREATE DATABASE student_db;
   
   USE student_db;
   
   CREATE TABLE users (
       id INT AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(50) UNIQUE NOT NULL,
       password VARCHAR(255) NOT NULL
   );
   
   CREATE TABLE students (
       student_id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       dept VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL
   );
   ```

3. **Configure Database Connection**
   - Open `db.php` and make sure your database credentials are correct:
   ```php
   $host = "localhost";
   $user = "root";
   $pass = "";
   $db = "student_db";
   ```

4. **Start XAMPP**
   - Start Apache and MySQL services in XAMPP Control Panel

5. **Access the Portal**
   - Open your browser and go to: `http://localhost/student_portal/`
   - Register a new account or login if you already have one

## 📁 Project Structure

```
student_portal/
├── index.php          # Login page
├── register.php       # Registration page
├── dashboard.php      # Main dashboard (view all students)
├── add_student.php    # Add new student
├── edit_student.php   # Edit student details
├── delete_student.php # Delete student
├── search.php         # Search functionality
├── about.php          # About page
├── logout.php         # Logout functionality
├── header.php         # Header navigation (included in all pages)
├── footer.php         # Footer (included in all pages)
├── db.php             # Database connection
├── styles.css         # All CSS styling
└── README.md          # This file!
```

## 🔐 Default Login

After setting up, you'll need to register a new account. There's no default login - just create your own account through the registration page!

## 💡 How It Works

1. **Registration**: Users can create an account with username and password (with confirmation)
2. **Login**: Secure login with session management
3. **Dashboard**: After login, you see all student records in a table
4. **CRUD Operations**: You can Create, Read, Update, and Delete student records
5. **Search**: Search for students by any field (name, department, email)

## 🎨 Design Notes

I tried to make it look modern and professional:
- Dark blue header with clean navigation
- Gradient footer with organized links
- Simple form designs
- Responsive layout that works on mobile too
- Smooth animations and hover effects

## 🐛 Known Issues / Future Improvements

- [ ] Add pagination for large student lists
- [ ] Add profile picture upload for students
- [ ] Add more validation and error handling
- [ ] Add email notifications
- [ ] Maybe add a forgot password feature
- [ ] Add export to CSV/Excel functionality

## 📝 Notes

This was a learning project for me, so the code might not be perfect but it works! 😅
Feel free to use it, modify it, or learn from it. If you find any bugs or have suggestions, let me know!

## 👨‍💻 About Me

Made by a BCA student (5th Semester) who's learning web development. This project was created as part of my academic coursework and helped me understand:
- PHP and MySQL database operations
- Session management
- Form handling and validation
- Basic security practices (password hashing)
- Frontend design with CSS

## 📄 License

This is a student project - feel free to use it for learning purposes!

---

**Thanks for checking out my project!** 🙏

If you have any questions or feedback, feel free to reach out!

Happy coding! 💻✨

