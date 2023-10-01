[//]: # (<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>)

[//]: # (<p align="center">)

[//]: # (<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>)

[//]: # (<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>)

[//]: # (<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>)

[//]: # (<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>)

[//]: # (</p>)

## About Blog System

In this project, users can create, edit and delete their posts after registering and logging in, specify the time of their publication and view the list of their posts.

[//]: # (- [Simple, fast routing engine]&#40;https://laravel.com/docs/routing&#41;.)

[//]: # (- [Powerful dependency injection container]&#40;https://laravel.com/docs/container&#41;.)

[//]: # (- Multiple back-ends for [session]&#40;https://laravel.com/docs/session&#41; and [cache]&#40;https://laravel.com/docs/cache&#41; storage.)

[//]: # (- Expressive, intuitive [database ORM]&#40;https://laravel.com/docs/eloquent&#41;.)

[//]: # (- Database agnostic [schema migrations]&#40;https://laravel.com/docs/migrations&#41;.)

[//]: # (- [Robust background job processing]&#40;https://laravel.com/docs/queues&#41;.)

[//]: # (- [Real-time event broadcasting]&#40;https://laravel.com/docs/broadcasting&#41;.)

[//]: # (Laravel is accessible, powerful, and provides tools required for large, robust applications.)

## Project Structure

The structure of this project is "Restful API" and the structure of "[API Response](https://laravel.com/docs/10.x/controllers#api-resource-routes)" is used in "[Routes](https://laravel.com/docs/10.x/controllers#api-resource-routes)" and "[Controllers](https://laravel.com/docs/10.x/controllers#api-resource-routes)".

At the time of creating the posts, you can specify the publication date so that the post will be published automatically at the specified time. For this purpose, the structure of "[Jab](https://laravel.com/docs/10.x/queues#creating-jobs)" and "[Schedule](https://laravel.com/docs/10.x/scheduling#defining-schedules)" has been used.

[//]: # (Laravel has the most extensive and thorough [documentation]&#40;https://laravel.com/docs&#41; and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.)

[//]: # ()
[//]: # (You may also try the [Laravel Bootcamp]&#40;https://bootcamp.laravel.com&#41;, where you will be guided through building a modern Laravel application from scratch.)

[//]: # ()
[//]: # (If you don't feel like reading, [Laracasts]&#40;https://laracasts.com&#41; can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.)

## Job

After defining "[Jab](https://laravel.com/docs/10.x/queues#creating-jobs)" and implementing the desired logic in it, it can be used in "[Queues](https://laravel.com/docs/10.x/queues#main-content)", "[Schedule](https://laravel.com/docs/10.x/scheduling#defining-schedules)", "[Event](https://laravel.com/docs/10.x/events#main-content)", etc.
In this project, the defined "[Jab](https://laravel.com/docs/10.x/queues#creating-jobs)" has the duty to check the posts that have not been published every day at a certain time, so that if the time has come to publish them, they will be published.

[//]: # (We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page]&#40;https://patreon.com/taylorotwell&#41;.)

## Schedule

After defining the "[Schedule](https://laravel.com/docs/10.x/scheduling#defining-schedules)" it is possible to determine what operation was performed in the desired time intervals.
In this project, we determined by using "[Schedule](https://laravel.com/docs/10.x/scheduling#defining-schedules)" that the created "[Jab](https://laravel.com/docs/10.x/queues#creating-jobs)" should be executed every day at a certain time so that the posts whose time has come to be published will be published automatically.

## PHPUnit Test

In this project, "[Tests](https://laravel.com/docs/10.x/testing#main-content)" have been written for parts of the system to find out about the correct functioning of the system.

## Security

For the security of the system, the authentication package "[Sanctum](https://laravel.com/docs/10.x/sanctum#main-content)" has been used, and due to the system's "Restful API", token has been used for authentication in order to provide a safe environment for creating and publishing posts.

