<?php

// interface unflyableBird {
//     function eat();
//     function drink();
// }

// interface flyableBird {
//     function fly();
// }

// class duck implements flyableBird,unflyableBird {
//     public function eat()
//     {
//         # code...
//     }
//     public function drink()
//     {
//         # code...
//     }
//     public function fly()
//     {
//         # code...
//     }
// }

// class chicken implements unflyableBird  {
//     public function eat()
//     {
//         # code...
//     }
//     public function drink()
//     {
//         # code...
//     }
// }



######################## anthor solution #####################

interface unflyableBird {
    function eat();
    function drink();
}
interface flyableBird extends unflyableBird {
    function fly();
}

class duck implements flyableBird {
    public function eat()
    {
        # code...
    }
    public function drink()
    {
        # code...
    }
    public function fly()
    {
        # code...
    }
}

class chicken implements unflyableBird {

}