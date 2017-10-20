<?php


class CallCenter
{
    private $dbi = false ;
    public function connectDb()
    {
        $db = new Database();
        $this->dbi = $db->connect();
    }

    public  function __construct()
    {
        $this->connectDb();
    }

    public function main()
    {

        while(true){

            //get input

            $input = trim(fgets(STDIN));
            if($input == 'Bye') {
                echo 'Good bye!';
                break;
            }
            $inputArr = explode(', ', $input);

            // check input, call appropriate method, print result

            if ($inputArr[0] == 'Remove') {
                $this->removeCustomer($inputArr[1], $inputArr[2]);
                echo "Customer $inputArr[1] $inputArr[2] removed.\n";
            } else {
                $countryArr = explode(' ', $inputArr[0]);
                $country = $countryArr[1];

                $res = $this->getCountryInfo($country, $inputArr[1], $inputArr[2]);
                if ($res != false) {
                    foreach ($res[0] as $i => $iv) {
                        echo 'Currency: '.$iv['description']."\n";
                    }
                    foreach ($res[1] as $i => $iv) {
                        echo 'Continent: '.$iv['continent_name']."\n";
                    }
                    foreach ($res[2] as $i => $iv) {
                        if ($iv['mountain_id'] != 0) {
                            echo "\n".'Forward customer for special offers!';
                            $id = $iv['mountain_id'];
                            $peak = $this->dbi->query("
                SELECT `elevation`
                FROM `peaks`
                WHERE `mountain_id` = \"$id\"
                ");
                        }
                    }
                    if (isset($peak)) {
                        foreach ($peak as $i => $iv) {
                            if ($iv['elevation'] > 4000) {
                                echo ' Show high mountain special equipment offers!'."\n";
                            }
                        }
                    }
                    echo 'Name: '.$inputArr[1]."\n".'Family: '.$inputArr[2]."\n";

                } else {
                    echo "Exception: Country doesn't exist.";
                }
            }



        }
    }

    //queries to DB

    private function removeCustomer($first_name, $last_name)
    {
        if ($this->dbi != false) {
            $this->dbi->query("
            DELETE FROM `customers`
            WHERE `customer_name` = \"$first_name\"
            AND `customer_family` = \"$last_name\"
            ");
        }
    }

    private function writeCustomerInfo($name, $family, $country_code)
    {
        if ($this->dbi != false) {
            $this->dbi->query("
            INSERT INTO `customers` (`country_code`, `customer_name`, `customer_family`)
            VALUES (\"$country_code\", \"$name\", \"$family\")
            ");
        } else {
            return false;
        }
    }

    private function getCountryInfo($str, $customer_name, $customer_family)
    {
        $countryInfo = null;
        $mountain_id = 0;
        if ($this->dbi != false) {
            $countryInfo = $this->dbi->query("
            SELECT `country_code`, `country_name`, `capital`, `currency_code`, `continent_code`
            FROM `countries` 
            WHERE `country_name` = \"$str\"
            OR `country_code` = \"$str\" 
            OR `iso_code` = \"$str\" 
            LIMIT 0, 1
            ");
            $mountain_id = $this->dbi->query("
            SELECT `mountain_id`
            FROM `mountains_countries` 
            WHERE `country_code` = \"$str\" 
            ");



            $code = null;
            $continent = null;
            foreach ($countryInfo as $i => $iv) {
                $this->writeCustomerInfo($customer_name, $customer_family, $iv['country_code']);
                echo 'Country: ' . $iv['country_name'] . "\n" . 'Capital: ' . $iv['capital'] . "\n";
                $currency_code = $iv['currency_code'];
                $code = $this->dbi->query("
            SELECT `description`
            FROM `currencies`
            WHERE `currency_code` = \"$currency_code\"
            ");
                $continent_type = $iv['continent_code'];
                $continent = $this->dbi->query("
            SELECT `continent_name`
            FROM `continents`
            WHERE `continent_code` = \"$continent_type\"
            ");
            }

            $result[] = $code;
            $result[] = $continent;
            $result[] = $mountain_id;

            return $result;
        } else {
            return false;
        }

    }
}