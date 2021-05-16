# Exchange of encrypted messages

Exchange of encrypted messages

#### To run this application you will need:
- PHP [link](https://www.php.net/)
- Composer [link](https://getcomposer.org/)
- Enabled sodium php extension [link](https://www.php.net/manual/en/sodium.installation.php)

#### Versions
* PHP 7.3.12
* Laravel 8.40.0

### Start

You need to download or clone this repo using link below:

`git clone https://github.com/imamovicdze/crypto-messaging.git`

Then navigate to folder `cd crypto-messaging` and

`composer install` and `npm install`

and change `.env.example` to `.env`

Now you run command:

`php artisan serve` and go to

`http://localhost:8000`

### Routes

`http://localhost:8000/encryption/symmetric` <br>
`http://localhost:8000/encryption/asymmetric/anonymous` <br>
`http://localhost:8000/encryption/asymmetric/authenticated`

`http://localhost:8000/authentication/symmetric` <br>
`http://localhost:8000/authentication/asymmetric`
