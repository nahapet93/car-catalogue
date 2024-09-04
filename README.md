- Pull the project from git provider `git clone https://github.com/nahapet93/car-catalogue.git`


- Go to frontend dir `cd frontend`
- Run `npm i`
- Run `npm run dev`


- Go to backend dir `cd backend`
- Rename `.env.example` file to `.env`inside your project root and fill the database information.
- Specify `FRONTEND_URL` as the Vite url (for example http://localhost:5173)
- Run `composer install`
- Run `npm i`
- Run `php artisan key:generate`
- Run `php artisan migrate:fresh --seed`
- Run `php artisan config:cache`
- Run `php artisan serve`


- Go to frontend url, click Login
- Log in using these credentials - admin@example.com / 12341234
