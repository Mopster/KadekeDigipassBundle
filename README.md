# KadekeDigipassBundle

Adds two-factor authentication to your application with [MyDigipass.com](http://www.mydigipass.com)

## Installation


### User

Have your user class implement the DigipassUser interface with the following methods:

```PHP
    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $digipass_uuid;

    /**
     * @param string $digipass_uuid
     */
    public function setDigipassUuid($digipass_uuid)
    {
        $this->digipass_uuid = $digipass_uuid;
    }

    /**
     * @return string
     */
    public function getDigipassUuid()
    {
        return $this->digipass_uuid;
    }
```

### Templates

#### Script

Add the following line of code to the bottom of your page

```twig
{{ render_digipass_script() }}
```

#### Login

Add the following line of code to your login screen :

```twig
{{ render_digipass_login() }}
```

#### connect

Add the following code to the edit screen of the user

```twig
{{ render_digipass_connect(user) }}
```

## TODO

Remove Kunstmaan Bundles dependency