<?php

namespace App\Test;

// use the following namespace
use PHPUnit\Framework\TestCase;
use App\Controllers\ResponsibleController;

 class CaseTest extends TestCase {

    
    private $test;

    public function setUp():void{
        $this->test = new ResponsibleController();
    }
    


    public function testvalidateNumberPositive():void{
        $this->assertFalse(false , $this->test->idtableResponsable(-350));
     } 
 }



 ?>