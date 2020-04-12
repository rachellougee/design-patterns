<?php

/* It is used to hide implementation details of algorithms needed to perform an operation */

class Transformer 
{
    private $output;

    public function setOutput(OutputInterface $outputType)
    {
        $this->output = $outputType;
    }

    public function loadOutput()
    {
        return $this->output->load();
    }
}

interface OutputInterface
{
    public function load();
}

class JsonStringOutput implements OutputInterface
{
    public function load()
    {
        return json_encode($array);
    }
}

class ArrayOutput implements OutputInterface
{
    public function load()
    {
        return $array;
    }
}


$transformer  = new Transformer();

$transformer->setOutput(new ArrayOutput());
$data = $transformer->loadOutput();

$transformer->setOutput(new JsonStringOutput());
$data = $transformer->loadOutput();