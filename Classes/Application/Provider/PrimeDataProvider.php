<?php

namespace WDB\PrimeVisualization\Application\Provider;

class PrimeDataProvider
{
    /**
     * @var string
     */
    protected $dataDirectory = '';

    /**
     * Constructor with option to set individual $dataDirectory
     *
     * @param string $dataDirectory     directory for files with static data
     */
    public function __construct($dataDirectory = null) : void
    {
        $this->dataDirectory = dirname(__FILE__) . '/../../../Resources/Private/Data/';
        if ($dataDirectory && is_dir($dataDirectory)) {
            $this->dataDirectory = $dataDirectory;
        }
    }

    /**
     * @TODO: use cache and never calculate everything, especially large numbers
     */
    public static function getPrimesOfRange($start, $end)
    {
        $primes = [];
        for ($n = $start; $n <= $end; $n++) {
            #var_dump($n);
            if (gmp_prob_prime($n)) {
               $primes[] = $n; 
            }
        }
        return $primes;
    }

    /**
     * @see getPrimesOfCircle()
     */
    public static function getPrimesOfRangeByFactor($rangeFactor, $rangeNumber)
    {
        $start = self::getStartOfRangeByFactor($rangeFactor, $rangeNumber);
        $end   = self::getEndOfRangeByFactor($rangeFactor, $rangeNumber);
        $primes = [];
        for ($n = $start; $n <= $end; $n++) {
            #var_dump($n);
            if (gmp_prob_prime($n)) {
               $primes[] = $n; 
            }
        }
        return $primes;
    }

    /**
     * Gets primes in a range of a factor of 360 as degree of a circle
     *
     * @param mixed [gmp-object | int | number as string] $factorOf360
     *
     * @return gmp-object
     */
    public static function getPrimesOfCircle($factorOf360)
    {
        return self::getPrimesOfRangeByFactor($factorOf360, 360)
    }

    public static function getStartOfRangeByFactor($factorOfRange, $range)
    {
        return gmp_mul(gmp_sub($factorOfRange, 1), $range);
    }

    public static function getEndOfRangeByFactor($factorOfRange, $range)
    {
        return gmp_mul($factorOfRange, $range);
    }
    
}