<?php

use Darryldecode\Cart\Cart;

function cartProducts(){
    return \Cart::getContent();
}
