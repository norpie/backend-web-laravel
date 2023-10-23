# TODO

## Features

### Minimum

- [ ] Login system
    - [ ] Users can log in
    - [ ] Visitors can create a new account
    - [ ] Users may or may not be an administrator
    - [ ] Only an administrator can promote another user to administrator status (or create a new user that is an admin)
- [ ] Profile pagina
    - [ ] Each user has their own publicly available profile page
    - [ ] A user can edit their own user data
    - [ ] The information shown is at least
        - [ ] Username
        - [ ] Birthday
        - [ ] Avatar (that can be uploaded and saved on the webserver)
        - [ ] Short 'about me' biography 
- [ ] Latest news
    - [ ] Admins can add, edit, and delete news items
    - [ ] Every visitor of the website can view the news posts
    - [ ] These news items have at least the following:
        - [ ] Title
        - [ ] Cover image
        - [ ] Content
        - [ ] Publishing date
- [ ] FAQ page
    - [ ] There is a list of questions and answers, grouped by categories
    - [ ] Admins can add, edit, and delete FAQ categories
    - [ ] Admins can add, edit, and delete FAQ question and answer pairs
    - [ ] Every visitor of the website can view the FAQ page(s)
- [ ] Contact page
    - [ ] Visitors can fill out a contact form
    - [ ] The content of submitted forms will be sent to the administrators

### Extra 

- [ ] Admins can reply to the submitted contact forms through the admin panel, the replies will be mailed to the original sender
- [ ] Users can leave comments on news posts
- [ ] Users can pose questions that might be added to the FAQ
- [ ] Admins can add answers to the posed FAQ questions through the admin panel
- [ ] Basic forum: Users can create threads, other users can leave replies
- [ ] Online ordering: A customer can (with or without being logged in) place an order for the products available on the website

## Technical

### Minimum

- [ ] Views
    - [ ] You will at least have an "about" page. This is a static view that will serve as your Readme/list of sources. Cite any resources that you've used in this page, as well as a link to those pages. This page is mandatory, if your about page does not exist, you will not be able to pass for this project.
    - [ ] Use at least 2 layouts (think about maybe splitting up the 'public' website and the admin panel)
    - [ ] Use partials where logical
    - [ ] Use the techniques we've seen during the exercises:
        - [ ] Control structures
        - [ ] XSS protection
        - [ ] CSRF protection
        - [ ] Client-side validation
- [ ] Routes
    - [ ] All routes use controller methods
    - [ ] All routes use logical middleware
    - [ ] If possible, group the routes where needed
- [ ] Controller
    - [ ] Use several controllers to split your logic
    - [ ] Think back to resource controllers for CRUD operations
- [ ] Models
    - [ ] Use Eloquent models
    - [ ] Add relationships where needed
        - [ ] At least 1 one-to-many
        - [ ] At least 1 many-to-many 
- [ ] Database
    - [ ] Your database needs to be created using migration files 
    - [ ] Add seeders to have some "dummy" data
    - [ ] I will run "php artisan migrate:fresh --seed" on every project. After running this your website should be usable for me
- [ ] Authentication
    - [ ] Default functionality for authentication
        - [ ] Log in/out
        - [ ] 'Remember me'
        - [ ] Register
        - [ ] Forgot password
        - [ ] Change password
    - [ ] Add 1 default admin with a seeder
        - [ ] Username: admin
        - [ ] Email: admin@ehb.be
        - [ ] Password: Password!321
- [ ] Theming/styles
    - [ ] Provide some default styling for your website. Even though design is not a core competence of this course, I expect a minimum. If you are not good at design, use something like Bootstrap and pick a free theme from a website such as https://startbootstrap.com/Links to an external site.
