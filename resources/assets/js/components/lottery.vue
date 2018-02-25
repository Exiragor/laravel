<script>
    export default {
        data() {
            return {
                types: []
            }
        },

        methods: {
            getTypes() {
                client.get('/api/types')
                    .then(response => {
                        this.types = response.data.data;
                    })
                    .catch(response => console.log(response));
            },
            getTypeElems(condition, getSymbol = false) {
                let arr = [];

                this.types.forEach((elem) => {
                    if (elem.value.indexOf(condition) >= 0) {

                        if (getSymbol) {
                            let tempArr = elem.value.split('_');
                            elem.symbol = tempArr[tempArr.length - 1];
                        }

                        arr.push(elem);
                    }
                });

                return arr;
            }
        },

        created() {
            this.getTypes();

        },

        computed: {
            letter_number_types() {
                return this.getTypeElems('any_');
            },
            any_letter_types() {
                return this.getTypeElems('letter_', true);
            },
            even_number_types() {
                return this.getTypeElems('even_number_', true);
            },
            odd_number_types() {
                return this.getTypeElems('odd_number_', true);
            },
        },
    }
</script>