var app = new Vue({
    el: '#invoice',
    data: {
        product: null,
        party: null,
        rate: null,
        qty: null,
        st: 17,
        whtTax: null,
        flag: false
    },
    methods: {
        myParty(someData, isTaxPayer) {
            console.log('It was Clicked ' + someData + ' ' + isTaxPayer);
            this.party = someData;
            if(isTaxPayer == 0)
                this.st = 0;
        },
        myProduct(product) {
            console.log('Product Code was clicked ' + product);
            this.product = product;
        },
    },
    computed: {
        myValue() {
            return this.rate * this.qty;
        },
        saleTaxValue() {
            return (this.st * this.myValue)/100;
        },
        whtValue() {
            return (this.whtTax * this.myValue)/100;
        },
        totalValue() {
            return this.myValue + this.saleTaxValue + this.whtValue;
        },
        isTrue() {
            if (this.product && this.party)
                this.flag = true;
        },
    },

})

