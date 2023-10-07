## About Blog System

In this project, users can create, edit and delete their posts after registering and logging in, specify the time of their publication and view the list of their posts.

## Project Structure

The structure of this project is "Restful API" and the structure of "[API Response](https://laravel.com/docs/10.x/controllers#api-resource-routes)" is used in "[Routes](https://laravel.com/docs/10.x/controllers#api-resource-routes)" and "[Controllers](https://laravel.com/docs/10.x/controllers#api-resource-routes)".

At the time of creating the posts, you can specify the publication date so that the post will be published automatically at the specified time. For this purpose, the structure of "[Jab](https://laravel.com/docs/10.x/queues#creating-jobs)" and "[Schedule](https://laravel.com/docs/10.x/scheduling#defining-schedules)" has been used.

## Job

After defining "[Jab](https://laravel.com/docs/10.x/queues#creating-jobs)" and implementing the desired logic in it, it can be used in "[Queues](https://laravel.com/docs/10.x/queues#main-content)", "[Schedule](https://laravel.com/docs/10.x/scheduling#defining-schedules)", "[Event](https://laravel.com/docs/10.x/events#main-content)", etc.
In this project, the defined "[Jab](https://laravel.com/docs/10.x/queues#creating-jobs)" has the duty to check the posts that have not been published every day at a certain time, so that if the time has come to publish them, they will be published.

## Schedule

After defining the "[Schedule](https://laravel.com/docs/10.x/scheduling#defining-schedules)" it is possible to determine what operation was performed in the desired time intervals.
In this project, we determined by using "[Schedule](https://laravel.com/docs/10.x/scheduling#defining-schedules)" that the created "[Jab](https://laravel.com/docs/10.x/queues#creating-jobs)" should be executed every day at a certain time so that the posts whose time has come to be published will be published automatically.

## PHPUnit Test

In this project, "[Tests](https://laravel.com/docs/10.x/testing#main-content)" have been written for parts of the system to find out about the correct functioning of the system.

## Security

For the security of the system, the authentication package "[Sanctum](https://laravel.com/docs/10.x/sanctum#main-content)" has been used, and due to the system's "Restful API", token has been used for authentication in order to provide a safe environment for creating and publishing posts.

## Logging

In this system, Laravel "logging" is used so that post changes, whether deleted or edited, and the user applying these changes are stored in the Laravel log system.

## Log Viewer

In this system, the "Log Viewer" package is used to display the system logs to the user with a suitable UI.