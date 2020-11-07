# Flarum Tinker

![MIT license](https://img.shields.io/badge/license-MIT-blue.svg)


This package brings the awesomeness of Laravel Tinker to your Flarum.

# Install
- First, require the package using composer

```bash
composer require luuhai48/flarum-tinker:dev-master
```


- Then, add this line to your `extend.php` file (In root directory of your project)

```php
return [
    new \Luuhai48\FlarumTinker\EnableTinker,
];
```
And that's it! Have fun!

> **If something went wrong, fix it yourself. I don't guarantee it works perfectly :))**

# Links
- [GitHub](https://github.com/luuhai48/flarum-tinker)
- [Packagist](https://packagist.org/packages/luuhai48/flarum-tinker)