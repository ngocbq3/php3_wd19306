<?php

interface People
{
    public function run();
    public function sound();
}

class Student implements People
{
    public function run()
    {
        echo "Sinh viên đang chạy đến lớp<br>";
    }

    public function sound()
    {
        echo "Sinh viên đang nói<br>";
    }
}

$sinhvienA = new Student;
$sinhvienA->run();
$sinhvienA->sound();
