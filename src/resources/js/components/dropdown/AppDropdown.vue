<template>
    <div>
        {{ open }}
        <div @click.prevent="open = !open">
            <slot name="trigger"/>
        </div>
        <div class="absolute bg-grey-900 z-50 rounded-lg w-56 overflow-hidden">
            <slot />
        </div>
    </div>
</template>

<script>
export default {
    data () {
        return {
            open: false
        }
    }
}
</script>
