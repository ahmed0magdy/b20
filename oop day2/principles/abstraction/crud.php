<?php
// crud => create read update delete

interface crud {
    function create();
    function read();
    function update($id);
    function delete($id);
}

interface data {
    function export();
    function import();
}

# php single inhertiance , multiple implements
class product implements crud,data {
    public function create()
    {
       echo "create product";
    }
    public function read()
    {
       echo "read product";
    }
    public function update($id)
    {
       echo "update product";
    }
    public function delete($id)
    {
       echo "delete product";
    }

    public function export()
    {
       echo "export product";
    }
    public function import()
    {
       echo "import product";
    }
}

class user implements crud,data  {
    public function create()
    {
       echo "create user";
    }
    public function read()
    {
       echo "read user";
    }
    public function update($id)
    {
       echo "update user";
    }
    public function delete($id)
    {
       echo "delete user";
    }
    public function export()
    {
       echo "export user";
    }
    public function import()
    {
       echo "import user";
    }
}

