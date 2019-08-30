# Http Request class implementation

### Base classes wrappers:

* Server
* Cookies
* Files
* Headers
* Query
* Parameters
* Attributes

### Installation:

`composer require marussia/request`

### Example:

`$request = Marussia\Request\Request::create($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);`

`$request->getUri(); \\ return current uri string`
