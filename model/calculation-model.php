<?php
class CalculationModel
{
    private $connetion;

    public $list_data = mysqli_query($this->connetion,"SELECT * FROM calculation_table");

    public function __construct($connetion)
    {
        $this->connetion = $connetion;
    }

    function addCalculation($paramResult, $paramError, $paramPopulation)
    {
        $query = "INSERT INTO calculation_table (population, error_rate, result) 
                VALUES ('$paramPopulation', '$paramError', '$paramResult')";
        return mysqli_query($this->connetion, $query);  
    }
}
?>