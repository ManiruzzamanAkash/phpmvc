# PHPMVC
A super fast, customizable and lightweight PHP MVC Starter Framework to extend for your own...

---

## How to Start
Clone this repo -
```sh
git clone https://github.com/ManiruzzamanAkash/phpmvc.git
cd phpmvc
composer install
```

## Modify the `.env` file
Duplicate `.env.example` and create `.env` file for your own -
```sh
BASE_DIR=
APP_TITLE="Site Title"

DB_HOST=localhost
DB_PORT=3306
DB_USER=root
DB_PASSWORD=
DB_NAME=phpmvc
```
1. `BASE_DIR`: The root directory of your project if you want to keep your project to any sub-directory of the domain, like `devsenv.com/new-app`. If no sub-directory is required, leave it empty.
1. `APP_TITLE`: The title of your site.
1. `DB_HOST`: The hostname of your database server, default : `localhost`.
1. `DB_PORT`: The port of your database server, default: `3306`
1. `DB_USER`: The username of your database server, default: `root`.
1. `DB_PASSWORD`: The password of your database server. default: empty.
1. `DB_NAME`: The name of your database, default: `phpmvc`.


## Extend: Add your own MVC

### Route
**Example 1:** Add routes in `route.php`

```php
<?php

use App\Base\Router;
use App\Controllers\WelcomeController;

Router::get('/', [WelcomeController::class, 'hello']);
```

**Example 2:** Closure function

```php
use App\Base\Router;

Router::get('/', function() {
    return 'Hello World';
});

Router::get('/hello-another', function() {
    return views('welcome/hello');
});
```

**Example 3:** Portfolio Route
```php

use App\Base\Router;
use App\Controllers\PortfoliosController;

Router::get('portfolios', [PortfoliosController::class, 'index']);
```

### Model
We can create any model inside `app\Models` folder by extending base `Model` class.

**Example 1**: Create a `TestModel` class in `app\Models\TestModel.php`.
```php
<?php

namespace App\Models;

use App\Base\Model;

class TestModel extends Model
{
   //
}
```

**Example 2**: Portfolio Model:
in `app\Models\Portfolio.php`

```php
<?php

namespace App\Models;

use App\Base\Model;

class Portfolio extends Model
{
    protected string $tableName = 'portfolios';

    public function get(): array|false
    {
        return $this->fetchAll("SELECT * FROM {$this->tableName}");
    }

    public function findById(int $id)
    {
    }
}
```

### Controller
We can create any controller inside `app\Controllers` folder by extending base `Controller` class.

**Example 1:** TestsController
in `app\Controllers\TestsController.php`
```php
<?php

namespace App\Controllers;

use App\Base\Controller;

class TestsController extends Controller
{
    public function index()
    {
        //
    }
}
```

**Example 2:** PortfoliosController
in `app\Controllers\PortfoliosController.php`

```php
<?php

namespace App\Controllers;

use App\Base\Controller;
use App\Models\Portfolio;

class PortfoliosController extends Controller
{
    public function index()
    {
        $portfolio = new Portfolio();
        $portfolios = $portfolio->get();

        return views('portfolios/index.php', compact('portfolios'));
    }
}
```

### Views
We can create any view file inside `views` folder.

**Example 1:** Simple view file:
in `views/index.php`

```php
<h2>Home Page</h2>
```


**Example 2:** View file with extending header and footer.

#### View Header:
in `views/partials/header.php`

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo env('APP_TITLE'); ?></title>

    <!-- Load Styles -->
    <link rel="stylesheet" href="<?php echo assets('css/style.css'); ?>">
</head>
<body>
    <!-- Load Header Nav-->
    <?php views('/partials/nav.php'); ?>

    <!-- Content start -->
    <div class="main-content">
        <!-- Content will be loaded here. -->
```

#### View Footer:
in `views/partials/footer.php`

```php
</div>
<!-- Script -->
<script src="<?php echo assets('js/base.js'); ?>"></script>
</body>
</html>
```

**Portfolio main view by extending header and footer.**

```php
<?php views('/partials/header.php'); ?>

<h2>Portfolios</h2>
<?php foreach($portfolios as $portfolio): ?>
    <li><?php echo $portfolio['title']; ?></li>
<?php endforeach;?>

<?php views('/partials/footer.php'); ?>
```

## Helper Methods

### `views()`
You can load any view file inside `views` folder using this `views()` function.

```php
// Index view file
views('index.php');

// Portfolio Views
views('portfolios/index.php');

// Pass additional data.
$name = 'Akash';
views('portfolios/index.php', compact('name'));

// Or pass multiple data.
$portfolios = [
    ['title' => 'Portfolio 1'],
    ['title' => 'Portfolio 2'],
];

views('portfolios/index.php', compact('portfolios'));
```

### `assets()`
Assets will be loaded from `assets` folder. You load CSS, JS or images by calling `assets` method.

```php
assets('css/style.css');
```

```php
assets('js/base.js');
```

### `env()`
Get environment variables by calling `env` method.

```php
env('DB_NAME');

env('APP_TITLE');
```

### `url()`
Create an url by the given path with this `url()` function.

```php
// Home URL
url('/');

// Portfolios URL
url('portfolios');
```

## Contributors

<!-- Table of contributors -->
<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Github</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Maniruzzaman Akash</td>
            <td><a href="https://github.com/ManiruzzamanAkash">ManiruzzamanAkash</a></td>
            <td>
                <a href="mailto:manirujjamanakash@gmail.com">manirujjamanakash@gmail.com
                </a>
            </td>
        </tr>
    </tbody>
</table>

### New Contribution
You're welcomed to any open-source contribution under MIT licence.

Create a Pull Request at https://github.com/ManiruzzamanAkash/phpmvc/pulls
