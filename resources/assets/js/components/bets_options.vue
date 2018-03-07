<script>
    export default {
        data() {
            return {
                types: []
            }
        },

        created() {
            client.get('/api/types').then(response => {
                this.types = response.data.data;
            });
        }
    }
</script>