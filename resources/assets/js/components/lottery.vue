<script>
    export default {
        data() {
            return {
                types: [],
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
                    return type;
                });
            },

            selectType(type) {
                type.selected = true;
            },

            clearType(group) {
                this[group + '_types'].map(type => {
                    type.selected = false;
                    return type;
                });
            },
        },

        computed: {
            common_types() {
                return _.filter(this.types, { group: 'common' });
            },

            letter_types() {
                return _.filter(this.types, { group: 'letter' });
            },

            even_number_types() {
                return _.filter(this.types, { group: 'even_number' });
            },

            odd_number_types() {
                return _.filter(this.types, { group: 'odd_number' });
            },

            selected_types() {
                return _.filter(this.types, { selected: true });
            },
        },
    }
</script>