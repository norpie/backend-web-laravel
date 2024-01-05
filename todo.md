# TODO

## Features

### Minimum

- [X] Login system
    - [X] Users can log in
    - [X] Visitors can create a new account
    - [X] Users may or may not be an administrator
    - [X] Only an administrator can promote another user to administrator status (or create a new user that is an admin)
- [X] Profile pagina
    - [X] Each user has their own publicly available profile page
    - [X] A user can edit their own user data
    - [X] The information shown is at least
        - [X] Username
        - [X] Birthday
        - [X] Avatar (that can be uploaded and saved on the webserver)
        - [X] Short 'about me' biography 
- [X] Latest news
    - [X] Admins can add, edit, and delete news items
    - [X] Every visitor of the website can view the news posts
    - [X] These news items have at least the following:
        - [X] Title
        - [X] Cover image
        - [X] Content
        - [X] Publishing date
- [X] FAQ page
    - [X] There is a list of questions and answers, grouped by categories
    - [X] Admins can add, edit, and delete FAQ categories
    - [X] Admins can add, edit, and delete FAQ question and answer pairs
    - [X] Every visitor of the website can view the FAQ page(s)
- [X] Contact page
    - [X] Visitors can fill out a contact form
    - [X] The content of submitted forms will be sent to the administrators

### Extra 

- [X] Admins can reply to the submitted contact forms through the admin panel, the replies will be mailed to the original sender
- [X] Users can leave comments on news posts
- [ ] Users can pose questions that might be added to the FAQ
- [ ] Admins can add answers to the posed FAQ questions through the admin panel
- [ ] Basic forum: Users can create threads, other users can leave replies
- [ ] Online ordering: A customer can (with or without being logged in) place an order for the products available on the website

## Technical

### Minimum

- [X] Views
    - [X] You will at least have an "about" page. This is a static view that will serve as your Readme/list of sources. Cite any resources that you've used in this page, as well as a link to those pages. This page is mandatory, if your about page does not exist, you will not be able to pass for this project.
    - [X] Use at least 2 layouts (think about maybe splitting up the 'public' website and the admin panel)
    - [X] Use partials where logical
    - [X] Use the techniques we've seen during the exercises:
        - [X] Control structures
        - [X] XSS protection
        - [X] CSRF protection
        - [X] Client-side validation
- [X] Routes
    - [X] All routes use controller methods
    - [X] All routes use logical middleware
    - [X] If possible, group the routes where needed
- [X] Controller
    - [X] Use several controllers to split your logic
    - [X] Think back to resource controllers for CRUD operations
- [X] Models
    - [X] Use Eloquent models
    - [X] Add relationships where needed
        - [X] At least 1 one-to-many
        - [X] At least 1 many-to-many 
- [X] Database
    - [X] Your database needs to be created using migration files 
    - [X] Add seeders to have some "dummy" data
    - [X] I will run "php artisan migrate:fresh --seed" on every project. After running this your website should be usable for me
- [X] Authentication
    - [X] Default functionality for authentication
        - [X] Log in/out
        - [X] 'Remember me'
        - [X] Register
        - [X] Forgot password
        - [X] Change password
    - [X] Add 1 default admin with a seeder
        - [X] Username: admin
        - [X] Email: admin@ehb.be
        - [X] Password: Password!321
- [ ] Theming/styles
    - [ ] Provide some default styling for your website. Even though design is not a core competence of this course, I expect a minimum. If you are not good at design, use something like Bootstrap and pick a free theme from a website such as https://startbootstrap.com/Links to an external site.
