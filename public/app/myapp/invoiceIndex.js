var app = new Vue({
    el: '#invoiceIndex',
    data: {
        message: 'Invoice Index Page',
        party: null,
        isTrue: false,
        isLoading : false,
        invoices: null
    },
    methods: {
        myParty(someData, isTaxPayer) {
            console.log('Product ' + someData + ' ' + isTaxPayer);
            this.party = someData;
            this.isTrue = true;
        },
        submit() {
            this.isTrue = false;
            this.requestToServer();
        },
        requestToServer() {
            this.isLoading = true;
            axios.get('/invoice/party/all/' + this.party.id)
            .then(response => {
                console.log(response.data);
                this.invoices = response.data;
                this.isLoading = false;
            })
            .catch(error => {
                console.log(error);
                this.isLoading = false;
            });
        }
    },

})
