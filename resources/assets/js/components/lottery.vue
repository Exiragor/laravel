<script>
    export default {
        data() {
            return {
                types: [],
                user_bets: [],
                rules: [
                    {
                        reg: 'letter_',
                        replace: 'Буква ',
                    },
                    {
                        reg: 'even_number_',
                        replace: 'Четное число ',
                    },
                    {
                        reg: 'odd_number_',
                        replace: 'Нечетное число ',
                    },
                    {
                        reg: 'any_letter',
                        replace: 'Любая буква',
                    },
                    {
                        reg: 'any_odd_number',
                        replace: 'Любое четное число',
                    },
                    {
                        reg: 'any_even_number',
                        replace: 'Любое нечетное число',
                    },
                ],
            }
        },

        created() {
            this.getTypes();
        },

        methods: {
            getTypes() {
                client.get('/api/types')
                    .then( response => this.setTypes(response.data.data) )
                    .catch( response => console.log(response) );
            },

            setTypes(types) {
                this.types = types.map(type => {
                    type.selected = false;
                    type.group_name = type.group.name;
                    return type;
                });
            },

            selectType(type) {
                type.selected = !type.selected;
            },

            clearType(group) {
                this[group + '_types'].map(type => {
                    type.selected = false;
                    return type;
                });
            },

            createBets() {
                if (!this.selected_types.length) return;
                client.post('/api/bets', {
                    currency_id: 1,
                    type_ids: this.selected_types.map(type => type.id),
                })
                .then( response => {
                    this.user_bets = response.data.data;
                    $('#bet-modal').modal('show');
                    console.log(response.data.data);
                })
                .catch( response => console.log(response) );
            },

            roundToPrecision(subject, precision) {
                return +((+subject).toFixed(precision));
            },

            getFormatName(name) {
                this.rules.forEach((element) => {
                    if (name.indexOf(element.reg) > -1) {
                        name = name.replace(new RegExp(element.reg, 'gi'), element.replace);
                        return true;
                    }
                });
                return name;
            },
        },

        computed: {
            common_types() {
                return _.filter(this.types, { group_name: 'common' });
            },

            letter_types() {
                return _.filter(this.types, { group_name: 'letter' });
            },

            even_number_types() {
                return _.filter(this.types, { group_name: 'even_number' });
            },

            odd_number_types() {
                return _.filter(this.types, { group_name: 'odd_number' });
            },

            selected_types() {
                return _.filter(this.types, { selected: true });
            },

            sum() {
                let sum = 0;

                this.user_bets.map(bet => {
                    sum = this.roundToPrecision(+(bet.group.rate_amount) + sum, 1);
                });

                return sum;
            },

            payments_address() {
                return this.user_bets.map(bet => {
                    return bet.payment.address;
                });
            },
        },
    }
</script>