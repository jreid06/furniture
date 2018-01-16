(function() {
    'use strict';
    // this function is strict...
}());


class BasketItem {
    constructor(id, stripe_id, prod_name, prod_tags, prod_desc, price, prod_image, quantity, category) {
        this.id = id;
        this.stripe_id = stripe_id;
        this.prod_name = prod_name;
        this.prod_tags = prod_tags;
        this.prod_desc = prod_desc;
        this.price = price;
        this.prod_image = prod_image;
        this.quantity = quantity;
        this.category = category;
        this.total_price = this.calculateTotal();
    }
    //getters - written as foo.totalPrice //NOTE doesn't have to be written as foo.totalPrice()
    get totalPrice(){
        return this.total_price;
    }

    //methods
    calculateTotal(){
        return parseInt((this.price * this.quantity));
    }
}

class User {
    constructor(title, fname, lname, email, password) {
        this.title = title;
        this.fname = fname;
        this.lname = lname;
        this.email = email;
        this.password = password;
    }
}

$(document).ready(function(){
    console.log('connected but separate from main.js');

    /*TEMP CODE TO ADD ITEMS TO LOCAL STORAGE

    let item1 = new BasketItem('001', 'Kitchen Item 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud', 29, '/assets/products/k1.jpg', 1, 'livingroom'),
        item2 = new BasketItem('002', 'Kitchen Item 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud', 65, '/assets/products/k2.jpg', 1, 'kitchen'),
        item3 = new BasketItem('003', 'Kitchen Item 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud', 30, '/assets/products/k1.jpg', 2, 'kitchen'),
        item4 = new BasketItem('004', 'Kitchen Item 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud', 12, '/assets/products/k1.jpg', 2, 'bath');

        let arr = [item1, item2, item3, item4];

        localStorage.setItem('basket', JSON.stringify(arr));

        alert('basket set');

    */

    /*
        OLD BASKET ITEMS DATA

        {
            id: '0001',
            category: 'livingroom',
            prod_name: 'Kitchen Item 1',
            description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.',
            price: 29,
            prod_image: '/assets/products/k1.jpg',
            quantity: 1,
            total_price: function(){
                return this.quantity * this.price;
            },
            itemTotal: function(){
                return this.quantity * this.price;
            }

        },
        {
            id: '0002',
            category: 'kitchen',
            prod_name: 'Kitchen Item 2',
            description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.',
            price: 65,
            prod_image: '/assets/products/k2.jpg',
            quantity: 1,
            total_price: function(){
                return this.quantity * this.price;
            },
            itemTotal: function(){
                return this.quantity * this.price;
            }

        },
        {
            id: '0003',
            category: 'bath',
            prod_name: 'Kitchen Item 3',
            description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.',
            price: 34,
            prod_image: '/assets/products/k3.jpg',
            quantity: 2,
            total_price: function(){
                return this.quantity * this.price;
            },
            itemTotal: function(){
                return this.quantity * this.price;
            }

        },
        {
            id: '0004',
            category: 'kitchen',
            prod_name: 'Kitchen Item 4',
            description: 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.',
            price: 12,
            prod_image: '/assets/products/k4.jpg',
            quantity: 4,
            total_price: function(){
                return this.quantity * this.price;
            },
            itemTotal: function(){
                return this.quantity * this.price;
            }

        }
    */

})
