
## Instalation

```
composer require woodoocoder/laravel-location
```

## Customization

```
php artisan vendor:publish --tag location-config
```

## Initialization 

```
php artisan locations:init
```

## Models 

```
Woodoocoder\LaravelLocation\Model\Country
Woodoocoder\LaravelLocation\Model\Region
Woodoocoder\LaravelLocation\Model\City
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
