<?php

    /**
     *
     */
    class Orderitem
    {
        public $type;
        public $parent;
        public $quantity;


        function __construct($type, $parent, $quantity)
        {
            $this->type = $type;
            $this->parent = $parent;
            $this->quantity = $quantity;

        }

    }

    /**
     *
     */
    class Parcelitem
    {
        public $weight = 0;
        public $width = 0;
        public $length = 0;
        public $height = 0;

        function __construct($weight, $width, $length, $height)
        {
            $this->weight = $weight;
            $this->width = $width;
            $this->length = $length;
            $this->height = $height;
        }
    }



 ?>
