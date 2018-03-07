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
                bets: this.items,
                names: {
                    letter: this.letter,
                    select: this.select,
                    odd_num: this.odd_num,
                    even_num: this.even_num
                }
            }
        },

        mounted() {
            Echo.channel('bets')
                .listen('.bets.updated', (data) => {
                    this.bets.unshift(data.bet);
                })
                .listen('.bets.new.winners', (data) => {
                    for (let winner in data.winners) {
                        for (let bet in this.bets) {
                            if (this.bets[bet].id === data.winners[winner].id) {
                                this.bets[bet].winner = true;
                            }
                        }
                    }
                });

        }
    }
</script>