<template>
<button class="btn"
        v-bind:class="{ 'btn-primary': btnStatus, 'btn-secondary': !btnStatus }"
        v-bind="{ disabled: !btnStatus }"
        @click="addVote">
  <i class="far fa-thumbs-up"></i>
</button>
</template>

<script>
export default {
    props: ['teamName', 'disabled'],

    mounted() {
        console.log('Component mounted.')
    },

    methods: {
        addVote() {
            axios.post('votes/store', {teamName: this.teamName})
                .then(function(response) {
                    document.location.reload(true);
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    },

    computed: {
        btnStatus() {
            return this.disabled == 1 ? false : true;
        }
    }
}
</script>
