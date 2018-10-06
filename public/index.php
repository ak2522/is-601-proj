<?php
main::start();
class main
{
    static public function start($filename)
    {
        $records = csv::getRecords($filename);
        $table = html::build_table($records);
        system:: Printpage($table);
    }

}

class csv
{
    static public function getRecords($filename)
    {}
}

class html
{
    public static function build_table($array)
    {}
}

class system{
    static public function Printpage($page)
    {
        echo $page;
    }

}