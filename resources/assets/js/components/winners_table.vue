<script>
    export default {
        props: {
            items: {
                type: Array,
                required: false
            },
            symbol: {
                type: String,
                required: false,
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
                winners: this.items,
                win_symbol: (this.symbol) ? this.symbol : 'Пока нету! =)',
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
                .listen('.bets.new.winners', (data) => {
                    for (let index in data.winners) {
                        let exist = false;
                        for (let winner in this.winners) {
                            if (JSON.stringify(this.winners[winner])
                                ===
                                JSON.stringify(data.winners[index])) {

                                exist = true;
                                break;
                            }
                        }
                        if (!exist)
                            this.winners.unshift(data.winners[index]);
                    }
                    this.win_symbol = data.symbol;
                });
        }
    }
</script>