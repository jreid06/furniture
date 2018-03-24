{
    address: '#',
    title: 'living room',
    slug: 'livingroom'
}, {
    address: '#',
    title: 'kitchen',
    slug: 'kitchen'
}, {
    address: '#',
    title: 'bedroom',
    slug: 'bedroom',
}, {
    address: '#',
    title: 'bath',
    slug: 'bath'
}, {
    address: '/brands',
    title: 'brands'
}, {
    address: '/products/gifts',
    title: 'gifts'
}, {
    address: '/our-story',
    title: 'our story'
}, {
    address: '/blog',
    title: 'blog'
}


// products listing for home Vue

livingroom: [{
        key: '#L01',
        name: 'all products',
        slug: '',
        cat: 'livingroom'
    },
    {
        key: '#L02',
        name: 'candle holders',
        slug: 'candle-holders',
        cat: 'livingroom',
        image: '/assets/main/dust_scratches.png',
        currentPage: window.location.pathname.split('/')[3] === 'candle-holders' ? true : false
    },
    {
        key: '#L03',
        name: 'plaids',
        slug: 'plaids',
        cat: 'livingroom',
        image: '/assets/main/dust_scratches.png',
        currentPage: window.location.pathname.split('/')[3] === 'plaids' ? true : false
    },
    {
        key: '#L04',
        name: 'cushions',
        slug: 'cushions',
        cat: 'livingroom',
        image: '/assets/main/dust_scratches.png',
        currentPage: window.location.pathname.split('/')[3] === 'cushions' ? true : false
    },
    {
        key: '#L05',
        name: 'lamps',
        slug: 'lamps',
        cat: 'livingroom',
        image: '/assets/main/dust_scratches.png',
        currentPage: window.location.pathname.split('/')[3] === 'lamps' ? true : false
    },
    {
        key: '#L06',
        name: 'nips',
        slug: 'nips',
        cat: 'livingroom',
        image: '/assets/main/dust_scratches.png',
        currentPage: window.location.pathname.split('/')[3] === 'nips' ? true : false
    },
    {
        key: '#L07',
        name: 'poster',
        slug: 'poster',
        cat: 'livingroom',
        image: '/assets/main/dust_scratches.png',
        currentPage: window.location.pathname.split('/')[3] === 'posters' ? true : false
    },
    {
        key: '#L08',
        name: 'shelves',
        slug: 'shelves',
        cat: 'livingroom',
        image: '/assets/main/dust_scratches.png',
        currentPage: window.location.pathname.split('/')[3] === 'shelves' ? true : false
    },
    {
        key: '#L09',
        name: 'pots',
        slug: 'pots',
        cat: 'livingroom',
        image: '/assets/main/dust_scratches.png',
        currentPage: window.location.pathname.split('/')[3] === 'pots' ? true : false
    }
],
kitchen: [{
        key: '#K01',
        name: 'all products',
        slug: '',
        cat: 'kitchen'
    },
    {
        key: '#K02',
        name: 'kitchen textiles',
        slug: 'kitchen-textiles',
        cat: 'kitchen',
        image: '',
        currentPage: window.location.pathname.split('/')[3] === 'kitchen-textiles' ? true : false
    },
    {
        key: '#K03',
        name: 'dining',
        slug: 'dining',
        cat: 'kitchen',
        image: '',
        currentPage: window.location.pathname.split('/')[3] === 'dining' ? true : false
    },
    {
        key: '#K04',
        name: 'cook',
        slug: 'cook',
        cat: 'kitchen',
        image: '',
        currentPage: window.location.pathname.split('/')[3] === 'cook' ? true : false
    }
],
bedroom: [{
        key: '#BE01',
        name: 'all products',
        slug: '',
        cat: 'bedroom'
    },
    {
        key: '#BE02',
        name: 'bed linen',
        slug: 'linen',
        cat: 'bedroom',
        image: '',
        currentPage: window.location.pathname.split('/')[3] === 'linen' ? true : false
    },
    {
        key: '#BE03',
        name: 'cushions',
        slug: 'cushions',
        cat: 'bedroom',
        image: '',
        currentPage: window.location.pathname.split('/')[3] === 'cushions' ? true : false
    },
    {
        key: '#BE04',
        name: 'lamps',
        slug: 'lamp',
        cat: 'bedroom',
        image: '',
        currentPage: window.location.pathname.split('/')[3] === 'lamps' ? true : false
    },
    {
        key: '#BE05',
        name: 'nips',
        slug: 'nips',
        cat: 'bedroom',
        image: '',
        currentPage: window.location.pathname.split('/')[3] === 'nips' ? true : false
    },
    {
        key: '#BE06',
        name: 'poster',
        slug: 'posters',
        cat: 'bedroom',
        image: '',
        currentPage: window.location.pathname.split('/')[3] === 'poster' ? true : false
    }
],
bath: [{
        key: '#BA01',
        name: 'all products',
        slug: '',
        cat: 'bath'
    },
    {
        key: '#BA02',
        name: 'towel',
        slug: 'towel',
        cat: 'bath',
        image: '',
        currentPage: window.location.pathname.split('/')[3] === 'towel' ? true : false
    },
    {
        key: '#BA03',
        name: 'shower curtains',
        slug: 'curtains',
        cat: 'bath',
        image: '',
        currentPage: window.location.pathname.split('/')[3] === 'curtains' ? true : false
    },
    {
        key: '#BA04',
        name: 'accessories',
        slug: 'accessories',
        cat: 'bath',
        image: '',
        currentPage: window.location.pathname.split('/')[3] === 'accessories' ? true : false
    }
]
