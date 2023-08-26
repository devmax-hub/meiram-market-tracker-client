## Backend Pre-Registration
This plugin, is an extension of [SunLab.Registration][sunlab.registration], it allows your visitors to pre-register to your service as **Backend Users**.
Like the registration plugin, its main goal is to be used to develop SaaS applications using the OctoberCMS backend as your main service layer.

#### Important: Read this before enabling it in production
Make sure to create at least one limited role and configure this plugin to set the correct role to your new users.

_This step is mandatory to make sure no one can get Super Admin role_

### What you'll get when installing this plugin
This plugin adds all the classic steps of a registration process, including:
#### Basics:
It creates a basic pre-registration page, accessible via the `/preregister` backend route using only one field: email.
Once a new user is registered, the plugin displays a "thank you" page.

The new users are created using a random login and password without sending them to the users.
The newly created users are attached to a "pre-registered role"

#### Optional:
##### Additional fields
The plugin allows you to easily create additional fields you may want to display on the pre-registration page.
This is useful if you want to collect some additional information about the pre-registered user needed for your service.
For now: text, password and checkbox are supported.

You can set the label, the name and the required status of the field directly from the settings.
You can add attributes to the input field using key-value pairs.

When this option is used, a tab is created in the Administrators settings page,
displaying the information your used filled.

##### Automatically send the credentials
Using this option will automatically send the credentials to your used on the date you've chosen from the settings.
During the credential emails sending process, the role you've chosen is attached to all the pre-registered users.

> Note: To use this option, be sure you've correctly activated cron on your server.
>
> [Read the doc][activate cron on server]

> Note: Optionally, if you've activated the queue on your server, it will be used.
> You should be aware that even if it's optional, not activating this option may slow your server while sending all the credentials emails.
>
> [Read the doc][activate queues]

##### Coming soon page
If you don't want to open pre-registration for the moment, choose the date you want to open it.
Before that date, the users will be redirected to this page, displaying the opening date.

### The logic between Registration and PreRegistration
When both Registration and PreRegistration settings are filled,
you should be aware that the plugins will look each-others to redirect the users to the correct page:
- When both registration and pre-registration are closed, users will be redirected to the **sign-in** page.
- When both registrations and pre-registrations are open, **registration page** will be displayed.
- When registration is set to "coming soon" and pre-registrations is open, **pre-registration page** will be displayed. Without displaying the coming soon page.
- When both registration and pre-registration are set to "coming soon", **pre-registration coming-soon** page will be displayed.

### How to override views
If, for any reason, your want to override the default plugin's views:
- Copy the files default files from `plugins/sunlab/backendpreregistration/controllers/preregistrationcontroller/` to your custom plugin.
- Extend the `AuthController` and `PreRegistrationController` to register the new views files path:

```php
SunLab\BackendPreRegistration\Controllers\PreRegistrationController::extend(function ($controller) {
    $controller->addViewPath(plugins_path('author/plugin/views'));
});
```

[sunlab.registration]:https://github.com/SunLabDev/backend-registration
[activate cron on server]:https://octobercms.com/docs/setup/installation#crontab-setup
[activate queues]:https://octobercms.com/docs/setup/installation#queue-setup
