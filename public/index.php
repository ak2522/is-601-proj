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
    {
        $file = fopen($filename,"r");
        $fields = array();
        $count = 0;

        while(! feof($file))
        {
            $record = fgetcsv($file);
            if ($count == 0)
            {
                $fields = $record;
            }
            else
            {
                $records[] = RecordFactory::create($fields, $record);
            }
            $count++;
        }
        fclose($file);
        return $records;

    }
}

class record
{
    public function __construct(Array $fields = null, Array $values = null)
    {
        $record = array_combine($fields,$values);
        foreach ($record as $property => $value)
        {
            $this->createProperty($property, $value);
        }

    }

    public function createProperty($property,$value)
    {
    $this->{$property} = $value;
    $property = '<th>' .$property.'</th>' ;
    $value = '<td>' .$value.'</td>';
    }

}
class RecordFactory
{
    public static function create(Array $fields = null,Array $values = null)
    {
        $record = new record($fields,$values);

        return $record;
    }

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