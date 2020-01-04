var app = new Vue({
    el: '#invoice',
    data: {
        productCode: null,
        partyCode: null,
        rate: null,
        qty: null,
        st: 17,
        whtTax: null
    },
    methods: {
        alert(someData) {
            console.log('It was Clicked ' + someData);
            this.partyCode = 1;
        },
        newAlert(product) {
            console.log('Product Code was clicked ' + product);
            this.productCode = 2;
        }
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
        isAvailable() {
            if (this.productCode && this.partyCode)
                return true;
            return false;
        }
    }

})

