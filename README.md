# Flarum Tinker

![License](https://img.shields.io/badge/license-MIT-blue.svg) [![Latest Stable Version](https://img.shields.io/packagist/v/luuhai48/flarum-tinker.svg)](https://packagist.org/packages/luuhai48/flarum-tinker)

A [Flarum](http://flarum.org) extension. It brings Laravel Tinker to Flarum.

![Flarum Tinker by Luuhai48](https://luuhai48.github.io/file/flarum-tinker-01.png "Flarum Tinker by Luuhai48")

### Installation

```sh
composer require luuhai48/flarum-tinker
```

- Enable the extension in your admin setting panel, or you can add these lines to your `{project_root}/extend.php` file.

```php
return [
    (new Extend\Console())->command(Luuhai48\FlarumTinker\TinkerCommand::class),
    (new Extend\Console())->command(Luuhai48\FlarumTinker\TinkerInstallCommand::class),
];
```

### Updating

```sh
composer update luuhai48/flarum-tinker
```

---
(Optional if you want to use alias classes)
```sh
composer dump-autoload -o
```

- Run the command below, you will find a config file published to `{project_root}/config/tinker.php`.

```sh
php flarum tinker:install
```

- Modify config file if you want to alias classes from specific package of your choice.

---

### Links

- [Github](https://github.com/luuhai48/flarum-tinker)
- [Packagist](https://packagist.org/packages/luuhai48/flarum-tinker)
