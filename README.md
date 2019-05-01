
## Instalation

```
composer require woodoocoder/laravel-location
```

## Initialization 

```
php artisan locations:init
```

## Routes

```
/api/location/countries

/api/location/regions
/api/location/regions/{countryId}

/api/location/cities
/api/location/cities/{countryId}
/api/location/cities/{countryId}/{regionId}
```
