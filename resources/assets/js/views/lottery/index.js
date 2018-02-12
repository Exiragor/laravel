Vue.component('lottery', {
    props: {
        betTypes: {
            type: Array,
            required: true
        }
    },
    data() {
        return {
            name: 'Betting options',
            items: [],
            types: this.props.betTypes
        }
    }
});