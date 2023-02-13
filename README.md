# Facebook Clone (facebook-clone)

### Tutorial showing you how to build Facebook

If you'd like a step by step guide on how to build this just **CLICK THE IMAGE BELOW**

[![GO TO JOHN WEEKS DEV TUTORIAL VIDEOS](https://user-images.githubusercontent.com/108229029/218329428-ba07011c-4ff4-4b67-8114-a636d46abc4f.png)](https://www.youtube.com/watch?v=NC1sU-LTrOk)

Come and check out my YOUTUBE channel for lots more tutorials -> https://www.youtube.com/@johnweeksdev

**LIKE**, **SUBSCRIBE**, and **SMASH THE NOTIFICATION BELL**!!!

## App Setup

```
git clone https://github.com/John-Weeks-Dev/facebook-clone.git

composer install 

cp .env.example .env 

php artisan cache:clear 

composer dump-autoload 

php artisan key:generate

composer require laravel/breeze --dev

php artisan breeze:install vue --ssr

php artisan serve
```
Create the DB
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=facebook_clone
DB_USERNAME=root
DB_PASSWORD=
```
Now migrate your DB
```
php artisan migrate

php artisan db:seed
```

Now run this command to start the project 
```
npm i

npm run dev
```

You should be good to go!

# Application Images

<img width="1436" alt="Screenshot 2023-02-10 at 19 11 00" src="https://user-images.githubusercontent.com/108229029/218089754-bb21191e-8e1d-4c13-bf47-f928d796805e.png">
<img width="1436" alt="Screenshot 2023-02-10 at 19 09 39" src="https://user-images.githubusercontent.com/108229029/218089772-bf8e851e-4f77-4726-b270-057120bb60fa.png">
<img width="1437" alt="Screenshot 2023-02-10 at 19 09 16" src="https://user-images.githubusercontent.com/108229029/218089795-01e2d21f-2da9-4db5-85bf-a4f58ff5c89b.png">
<img width="1436" alt="Screenshot 2023-02-10 at 19 07 34" src="https://user-images.githubusercontent.com/108229029/218089808-7e79c8d1-bf16-43af-992f-fc1137d72b44.png">
<img width="1436" alt="Screenshot 2023-02-10 at 19 06 51" src="https://user-images.githubusercontent.com/108229029/218089814-f5af9626-3b33-47cf-9a30-ac14638127f5.png">
<img width="1436" alt="Screenshot 2023-02-10 at 19 06 26" src="https://user-images.githubusercontent.com/108229029/218089819-926fd576-ded5-4f7e-9901-7f384b7271a4.png">
<img width="1440" alt="Screenshot 2023-02-10 at 19 05 58" src="https://user-images.githubusercontent.com/108229029/218089826-a997b1fc-16be-411d-b8ec-de0e46644ae1.png">
<img width="1436" alt="Screenshot 2023-02-10 at 19 05 36" src="https://user-images.githubusercontent.com/108229029/218089834-b2db0213-16ad-427e-894d-f7fbc58ea4da.png">
<img width="1437" alt="Screenshot 2023-02-10 at 19 04 45" src="https://user-images.githubusercontent.com/108229029/218089852-891382a5-0fde-4cb7-9b38-4174890e1693.png">
<img width="1436" alt="Screenshot 2023-02-10 at 19 04 32" src="https://user-images.githubusercontent.com/108229029/218089856-1b017c3e-aa89-41e3-bab2-6614ef80b63c.png">
<img width="1436" alt="Screenshot 2023-02-10 at 19 11 28" src="https://user-images.githubusercontent.com/108229029/218089731-0a2173d2-d46a-4eff-9a51-71bfcb172779.png">
