<script>
    export default {
        data() {
            return {
                select: {
                    show: false,
                    value: ''
                },
                letter: {
                    show: false,
                    value: ''
                },
                even_num: {
                    show: false,
                    value: ''
                },
                odd_num: {
                    show: false,
                    value: ''
                },
                price: 0.3,
                sum: 0
            }
        },
        created() {

        },
        methods: {
            showField(field, e) {
                e.preventDefault();
                this[field].show = !this[field].show;
                if (!this[field].show) {
                    this[field].value = '';
                    this.sum = this.roundToPrecision(this.sum - this.price, 1);
                } else {
                    this.sum = this.roundToPrecision(this.sum + this.price, 1);
                }
            },
            roundToPrecision: function(subject, precision) {
                return +((+subject).toFixed(precision));
            }
        }
    }
</script>