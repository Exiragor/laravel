<script>
    export default {
        props: {
            items: {
                type: Array,
                required: false
            },
            letter: {
                type: String,
                required: true,
            },
            select: {
                type: String,
                required: true,
            },
            odd_num: {
                type: String,
                required: true,
            },
            even_num: {
                type: String,
                required: true,
            },

        },
        data() {
            return {
                items: this.items,
                names: {
                    letter: this.letter,
                    select: this.select,
                    odd_num: this.odd_num,
                    even_num: this.even_num
                }
            }
        },
    }
</script>