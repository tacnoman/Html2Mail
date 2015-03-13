# Html2Mail

Library like Premailer (ruby) to render better your html template in email marketging.

```php
require 'vendor/autoload.php';
use Html2Mail\Client;

$body = file_get_contents('path/to/my/html/file.html');
$page = new Client($body);
$page->premailer(); // Changing the tag <style> to style attributes
echo $page;
```

It's simple like this xD

## Bug report
Renato Cassino <renatocassino@gmail.com>
