#Dotenv Loader
There was a requirement to pass through multiple values (array)
for a given key. The most widely used Dotenv/Dotenv package 
doesn't allow for this by default, so I went ahead and
made one which does.

In this version, we provide an Adaptor which you can define how
the data is loaded, given 2 parameters. For example: 

The default is loading a file but we could create a new Adaptor 
to load from a database, or a redis server.

To use this

    use Phpcodex\Dotenv\Dotenv;

Then to load the contents of a .env file.

    $dotEnv = Dotenv::create();
    $dotEnv->load();

If an environment variable is already set, we can use the
overload method to force the new version.
    
    $dotEnv = Dotenv::create();
    $dotEnv->overload();

NOTE

The initial key will always be uppercased. This is a standard
format for environment variables. Sections (arrays) will be
a JSON string. So you will need to decode the value.