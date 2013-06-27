# KadekeDigipassBundle

Adds two-factor authentication to your application with [MyDigipass.com](http://www.mydigipass.com)

## Script

Add the following line of code to the bottom of your page

```twig
{{ render_digipass_script() }}
```

## Login

Add the following line of code to your login screen :

```twig
{{ render_digipass_login() }}
```

## connect

Add the following code to the edit screen of the user

```twig
{{ render_digipass_connect(user) }}
```

## TODO

Remove Kunstmaan Bundles dependency