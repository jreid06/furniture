(function() {
    'use strict';
    // this function is strict...
}());


class BasketItem {
    constructor(product_id, stripesku_id, prod_name, prod_size, prod_color, name_slug, prod_desc, price, prod_image, quantity, category, prod_type) {
        this.product_id = product_id;
        this.stripesku_id = stripesku_id;
        this.prod_name = prod_name;
        this.name_slug = name_slug;
        this.prod_tags = {
            size: prod_size,
            color: prod_color
        };
        this.prod_desc = prod_desc;
        this.price = price;
        this.prod_image = prod_image;
        this.quantity = quantity;
        this.category = category;
        this.prod_type = prod_type;
        this.total_price = this.calculateTotal();
    }
    //getters - written as foo.totalPrice //NOTE doesn't have to be written as foo.totalPrice()
    get totalPrice(){
        return this.total_price;
    }

    //methods
    calculateTotal(){
        return (this.price * this.quantity);
    }
}

class User {
    constructor(title, fname, lname, dob, email, password) {
        this.title = title;
        this.fname = fname;
        this.lname = lname;
        this.dob = dob;
        this.email = email;
        this.password = password;
    }
}

class UpdateUserDetails {
    constructor(id, title, fname, lname, dob) {
        this.id = id;
        this.title = title;
        this.fname = fname;
        this.lname = lname;
        this.dob = dob;
    }
}

class UpdateLoginDetails {
    constructor(id, email, email_confirm, password, password_confirm) {
        this.id = id;
        this.email = email;
        this.email_confirm = email_confirm;
        this.password = password;
        this.password_confirm = password_confirm;

    }
}

class LoginUser {
    constructor(email, password, rememberMe) {
        this.email = email;
        this.password = password;
        this.rememberMe = rememberMe;
    }
}

class Address {
    constructor(title, fname, lname, phone, address1, address2, address3, city_town, post_code, country) {
        this.title = title;
        this.fname = fname;
        this.lname = lname;
        this.phone = phone;
        this.address1 = address1;
        this.address2 = address2;
        this.address3 = address3;
        this.city_town = city_town;
        this.post_code = post_code;
        this.country = country;
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
