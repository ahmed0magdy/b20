<?php

interface data1 {
    function import();
}

class main {
    public function import()
    {

    }
}


class user extends main implements data1 {

}