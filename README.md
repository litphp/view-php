PhpView for lit
===============

> Native php templating for lit

with [slim/php-view](https://github.com/slimphp/PHP-View)

### Usage

In a standard [litphp/project](https://github.com/litphp/project):

+ add dependency & install 

```bash
composer require litphp/view-php
```

+ append configuration

Create a template dir in your project root, says `template`. Write your first template file `templates/index.phtml`
```php
Hello <?=name?>!
```

Merge `PhpView::configuration` into your `configuration.php`. (with parameter of `\Slim\Views\PhpRenderer`)
```php
$configuration+=\Lit\View\Php\PhpView::configuration([__DIR__.'/templates']);
```

+ integration in action class

In `src/BaseAction.php`, use the trait `PhpViewBuilderTrait`
```php
abstract class BaseAction extends BoltAbstractAction
{
    use \Lit\View\Php\PhpViewBuilderTrait;
```

Change your `src/HomeAction.php` to render page

```php
class HomeAction extends BaseAction
{
    protected function main(): ResponseInterface
    {
        return $this->template('index.phtml')->render(['name' => 'native php']);
    }
```

That's all! Run your app by `php -S 127.0.0.1:3080 public/index.php`, and open <http://127.0.0.1:3080/>. You should see greetings from template "Hello native php!"
