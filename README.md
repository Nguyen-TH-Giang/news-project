## The Project Installation Instruction
Every package should be stored in the public/assets/vendor folder. In this project: the package is stored in the folder with the corresponding name, for example: everything inside the jquery folder after installation should also be inside the public/assets/vendor/jquery folder.

1. Clone the repository to your computer
2. Set up the project environment by using these command in your terminal: <br>
            git checkout develop<br>
            cp .env.example .env<br>
            composer install<br>
            npm install
3. Fill in information about your database, and gmail SMTP Server in the .env file
4. Move everything inside the <strong>jquery</strong> folder in the node_modules folder to the <strong>public\assets\vendor\jquery</strong> directory.
5. Move everything inside the <strong>jquery-validation</strong> folder in the node_modules folder to the
<strong>public\assets\vendor\jquery-validation</strong> directory.
6. Finally, run these command:<br>
php artisan key:generate<br>
php artisan migrate<br>
php artisan db:seed<br>
php artisan storage:link

<i><strong>Your environment are up to running!</strong></i>
