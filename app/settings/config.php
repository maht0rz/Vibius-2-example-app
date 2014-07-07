<?php

namespace vibius\app\settings;

class config{


    //Cache directory size limit in Kb
    public static $cacheFolderLimit = '20 000';

    //Cache file size limit in Kb
    public static $cacheFileLimit = '2000';

    //Db connection details

    public static $type = "mysql";
    public static $host = "localhost";
    public static $dbname = "blog";
    public static $username = "root";
    public static $password = "root";

}
