# Instrucciones de configuración

## 1. Instalar las dependencias de Composer

```bash
composer install
```

## 2. Confifugrar la base de datos
```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

## 3. Cargar los datos iniciales en base de datos
```bash
php bin/console doctrine:fixtures:load
```

## 4. Lanzar servidor
```bash
symfony serve
```
